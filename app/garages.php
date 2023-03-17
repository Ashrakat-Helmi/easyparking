<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class garages extends Model
{
   
    protected $table = "garages";
    protected $fillable = ['name', 'lat','long'];
}
