<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Updated_file extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function document(){
        return $this->belongsTo(Document::class,'user_id');
    }
}
