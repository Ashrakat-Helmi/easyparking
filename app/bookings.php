<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    
    protected $table = "bookings";
    protected $fillable = ['user_id', 'garage_id','corner_id','time_from','time_to','date','price'];
}
