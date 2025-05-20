<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    //
    public function document()
    {
        return $this->belongsTo(Document::class, 'project_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }
}
