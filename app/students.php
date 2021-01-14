<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $fillable = [
        'class_name','section_name','class_id','student_id','first_name', 'last_name', 'email', 'phone', 'picture', 'section_id'
        ];


        public function Getattendance()
        {
            return $this->hasMany(attendance::class, 'student_id', 'id');
        }
    
}
