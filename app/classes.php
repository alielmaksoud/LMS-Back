<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    protected $fillable = [
           'class_name'
         ];

         public function Getsections()
        {
            return $this->hasMany(section::class, 'class_id', 'id');
        }

        public function Getstudents()
        {
            return $this->hasMany(students::class, 'class_id', 'id');
        }
}
