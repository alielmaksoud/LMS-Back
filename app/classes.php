<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    protected $fillable = [
           'section_id', 'class_name'
         ];

         public function Getsections()
        {
            return $this->hasMany(section::class, 'class_id', 'id');
        }
}
