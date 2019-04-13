<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circulation extends Model
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
}
