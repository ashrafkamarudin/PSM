<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $primaryKey = 'isbn';

    public function circulations($value='')
    {
        return $this->hasOne('App\Circulation', 'isbn');
    }
}
