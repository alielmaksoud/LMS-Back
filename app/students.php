<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $fillable = [
        'class_id','student_id','first_name', 'last_name', 'email', 'phone', 'picture', 'section_id'
        ];


        public function GetAttendance()
        {
            return $this->hasMany(attendance::class, 'student_id', 'id');
        }
    
}
