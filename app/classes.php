<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    protected $fillable = [
        'class_id', 'section_id', 'class_name'
         ];
}
