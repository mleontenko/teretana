<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    protected $fillable = ['id', 'korisnik'];

    public $timestamps = false;
}
