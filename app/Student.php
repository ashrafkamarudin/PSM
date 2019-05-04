<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $primaryKey = 'ic_no';

    function getIcAttribute() {
        return str_pad($this->ic_no,12,'0',STR_PAD_LEFT);
    }

    public function circulation($value='')
    {
        return $this->hasMany('App\Circulation');
    }

    public function CheckIn($value='')
    {
        return $this->hasMany('App\Checkin');
    }
}
