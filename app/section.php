<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $fillable = [
         'section_name','class_id'
         ];


         public function Getstudents()
        {
            return $this->hasMany(students::class, 'section_id', 'id');
        }

        public function Getattendance()
        {
            return $this->hasManyThrough(attendance::class, students::class, 'section_id', 'section_id');
        }

}
