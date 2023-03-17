<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class corners extends Model
{
    
    protected $table = "corners";
    protected $fillable = ['corner_num', 'garage_id','status'];
}
