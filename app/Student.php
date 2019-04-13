<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $primaryKey = 'ic';

    public function circulation($value='')
    {
        return $this->hasMany('App\Circulation');
    }
}
