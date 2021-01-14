<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $fillable = [
        'section_id', 'student_id', 'status', 'date'
         ];
}
