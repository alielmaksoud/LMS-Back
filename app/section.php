<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $fillable = [
         'student_id', 'section_name','class_id'
         ];


         public function Getstudents()
        {
            return $this->hasMany(students::class, 'section_id', 'id');
        }
}
