<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $fillable = [
       'student_id', 'first_name', 'last_name', 'email', 'phone', 'picture'
        ];
}
