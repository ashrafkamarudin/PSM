<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CirculationHistory extends Model
{
    //
    protected $primaryKey = 'isbn';

    public function book($value='')
    {
        return $this->belongsTo('App\Book', 'isbn');
    }

    public function student($value='')
    {
        return $this->belongsTo('App\Student', 'std_ic');
    }

    public function user($value='')
    {
        return $this->belongsTo('App\User', 'staff');
    }
}
