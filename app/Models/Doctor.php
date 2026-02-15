<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Doctor extends Model
{
    //
=======
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Doctor extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'doctors';

    protected $fillable = [
        'name',
        'specialty',
        'phone',
        'availability',
    ];
>>>>>>> 36b2a0c (Doctor Management backend)
}
