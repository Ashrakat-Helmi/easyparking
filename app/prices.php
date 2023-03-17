<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prices extends Model
{
    
    protected $table = "prices";
    protected $fillable = ['hours', 'cost'];
}
