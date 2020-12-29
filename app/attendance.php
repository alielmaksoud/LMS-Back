<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $fillable = [
        'student_id', 'status', 'date'
         ];
}
