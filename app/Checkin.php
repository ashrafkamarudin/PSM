<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    //
    protected $primaryKey = 'std_ic';

    public function student($value='')
    {
        return $this->belongsTo('App\Student', 'std_ic');
    }
}
