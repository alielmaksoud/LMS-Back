<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $fillable = [
        'section_id', 'student_id', 'section_name'
         ];
}
