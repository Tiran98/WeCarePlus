<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Patient extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Patient';

    protected $fillable = [
        'Patient Name', 'Email','Password','Gender','Age','Address'
    ];
}
