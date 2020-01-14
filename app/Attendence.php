<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $fillable = [
        'users_registration_number','date','status','remarks',
    ];

    public function users(){
        return $this->belongsTo('App\User','users_registration_number','registration_number');
    }
}
