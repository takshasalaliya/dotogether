<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function pending_request(){
        return $this->hasMany(Pending_request::class, 'id','project_id');
    }
    public function active(){
        return $this->hasMany(Active::class, 'project_id','id');
    }
    public function updated_file(){
        return $this->hasMany(Updated_file::class, 'project_id','id');
    }

}
