<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'input1', 'input2','users_id',
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }
}
