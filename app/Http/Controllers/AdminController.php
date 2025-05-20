<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Active;
use App\Models\Document;
use App\Models\Pending_request;
use App\Models\Updated_file;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Mail\verifymail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon; 


class AdminController extends Controller
{
    //
    function signup(Request $request){
        
       $request->validate([
        'fullName' => 'required',
        'email' => 'required',
        'password' => 'required|confirmed|min:6',
        'terms' => 'required',
       ]);
       $valid=User::where('email',$request->email)->first();
       if(empty($valid->id)){
       $data=new User();
       $data->name=$request->fullName;
       $data->email=$request->email;
       $otp=Str::password(6,numbers: true,symbols: false,letters: false,spaces: false);
    //    return $otp;
       $data->email_verified=$otp;
       $data->password=$request->password;
       $email=$request->email[0].$request->email[1];
       $message=[
        'otp'=>$otp,
        'name'=>$request->fullName,
        'date'=>date('d-m-Y'),
       ];
       $subject="DoTogether Verification OTP";
       if($data->save()){
        Mail::to($request->email)->send(new verifymail($message,$subject));  
        $data=User::where('email_verified',$otp)->where('email',$request->email)->first();
        return view('verify_otp')->with([
            'email'=> $email,
            'id' => $data->id
        ]);
       }
    }
    return redirect()->back()->with('message','Account is aready exit');
    }
    function otp_verify(Request $request,$id){
        $data=User::where('id',$id)->first();
        $otps=$data->email_verified;
        for ($i=0; $i <6 ; $i++) { 
            if($otps[$i]!=$request->otp[$i]){
                return redirect()->back()->with('message','otp is wrong');
            }
        }

        $data->email_verified=1;
        $data->save();
        Auth::logout();
        return redirect('login');
    }


    function loginForm(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $valid=User::where('email',$request->email)->first();
        if(!empty($valid->id)){
            if(Auth::attempt($credentials)){
                $role=Auth::user()->role;
                if($role=='admin'){
                    return redirect('/admin');
                }
                if($role=='user'){
                    if($valid->email_verified==1){
                     
                        return redirect('dashboard')->with('successfull Login');
                    }else{
                        $otp=Str::password(6,numbers: true,symbols: false,letters: false,spaces: false);
                        $valid->email_verified=$otp;
                        $valid->save();
                        $message=[
                            'otp'=>$otp,
                            'name'=>$valid->name,
                            'date'=>date('d-m-Y'),
                           ];
                           $subject="DoTogether Verification OTP";
                           Mail::to($request->email)->send(new verifymail($message,$subject));  
                           return view('verify_otp')->with([
                            'email'=> $request->email[0].$request->email[1],
                            'id' => Auth::user()->id
                        ]);
                    }
                }

                return redirect()->back()->with('message','Invalid Error');
            }
            return redirect()->back()->with('message','Invalid Error');
        }
        return redirect()->back()->with('message','No Account Exit');
    }

    function dashboard(){
        $data=Document::inRandomOrder()->with('user')->get();
        return view('dashboard',[
            'datas'=>$data,
        ]);
    }



    function editprofile(Request $request){
        $data=User::where('id',Auth::user()->id)->first();
        $data->age=$request->age;
        $data->mobile=$request->mobile;
        $data->country=$request->country;
        $data->skill=$request->skills;
        $data->save();
        return redirect()->back();
        
    }

    function add_project(Request $request){
        $request->validate([
            'file'=>'required',
            'title'=>'required',
            'language'=>'required',
            'description'=>'required|min:20|max:50'
        ]);
        $file=$request->file;
        $data=new Document();
        $filename = Carbon::now()->format('YmdHis').'-'.Auth::user()->id . '.' . $file->getClientOriginalExtension();
        $data->file=$filename;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->language=$request->language;
        $data->user_id=Auth::user()->id;
        $request->file->move('assets',$filename);
        $data->save();
        $idcheck=Document::where('file',$filename)->where('user_id',Auth::user()->id)->first();
        $active=new Active();
        $active->project_id=$idcheck->id;
        $active->user_id=Auth::user()->id;
        $active->project_status='active';
        $active->file_name=$filename;
        $active->save();
        $projects=Document::where('user_id',Auth::user()->id)->get();
        return view('userprofile',['projects'=>$projects]);
    }

    function userprofile(){
        $projects=Document::where('user_id',Auth::user()->id)->get();
        return view('userprofile',['projects'=>$projects]);
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }

    function pending_requesr(){
        $data=Pending_request::with(['user','document'])->get();

        return view('pendingrequest',[
            'datas'=>$data,
        ]);
    }
    function project_request(Request $request){
        $value=explode('@',$request->button);
        $valid=Pending_request::where('user_id',$value[0])->where('project_id',$value[1])->first();
        $valid2=Active::where('user_id',$value[0])->where('project_id',$value[1])->first();
        // return $request;
        if(!empty($valid)){
            return redirect()->back()->with('message','Request Alredy Send');
        }
        if(!empty($valid2)){
            return redirect()->back()->with('message','You Already Work on This Project');
        }
        $data=new Pending_request();
        $data->user_id=$value[0];
        $data->project_id=$value[1];
        if($data->save()){
            return redirect()->back()->with('message','Request Send Successfully');
        }
        return redirect()->back()->with('message','Retry after some time');

    }

    function opration(Request $request,$id,$num){
        $value= Pending_request::with('document')->where('id',$id)->first();   
        if($num==0){
            $delete=Pending_request::where('id',$id)->delete();
            return redirect()->back()->with('message','Success fully delete member');
        }
        $valid=Active::where('project_id',$value->project_id)->where('user_id',$value->user_id)->first();
        if(empty($valid)){
            $data=new Active();
            $data->project_id=$value->project_id;
            $data->user_id=$value->user_id;
            $data->file_name=$value->document->file;
                if($data->save()){
                $delete=Pending_request::where('id',$id)->delete();
                    return redirect()->back()->with('message','Successfully add member');
                }
        }
        return redirect()->back()->with('message','Retry after some time');
    }

    function activeproject(){
        $data = Active::with(['user', 'document'])
        ->where('user_id',Auth::user()->id)
        ->get();
            return view('activeproject',[
            'datas'=>$data,
        ]);
    }

    function deactive($id){
        $datas=Active::where('project_id',$id)->get();
        foreach($datas as $data){
            $data->project_status=$data->project_status=='inactive'?'active':'inactive';
            $data->save();
        }
        return redirect()->back()->with('message','Successfully Operation Done');
    }


    function projectDetail($id){
        $valid=Active::with(['document','user'])->where('project_id',$id)->get();
        $go=0;
        foreach($valid as $check){
            if($check->user_id==Auth::user()->id){
                $go=1;
            }
        }
        if($go==0){
            return redirect()->back()->with('message','Invalid Url');
        }
        $projects=Active::with(['document','user'])->where('project_id',$id)->get();
        $detail=Active::with(['document','user'])->where('project_id',$id)->first();
        $file=Updated_file::where('project_id',$id)->with(['document','user'])->get();
        return view('activeproject_detail',[
            'projects' => $projects,
            'detail' => $detail,
            'files' => $file,
        ]);
    }
    function upload_file(Request $request, $id){
        $file=$request->file;
        $filename = Carbon::now()->format('YmdHis').'-'.'updated'.'-'.Auth::user()->id . '.' . $file->getClientOriginalExtension();
        $data = new Updated_file();
        $data->user_id=Auth::user()->id;
        $data->project_id=$id;
        $data->file=$filename;
        if($data->save()){
        $request->file->move('assets',$filename);
        return redirect()->back()->with('message','Successfully File Updated');
        }
        return redirect()->back()->with('message','Try after Some Time ');

    }

    function delete($id){
        $data=Document::where('id',$id)->first();   
        $filePath = public_path('assets/' . $data->file);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        if($data->delete()){
            return redirect()->back()->with('message','Successfully Project Deleted');
        }
        return redirect()->back()->with('message','Project Can Not Be Deleted Try Again');
    }
}
