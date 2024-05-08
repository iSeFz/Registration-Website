<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{   
    protected $table = 'Users';
    public $timestamps = false;

    // make sure to create this table in the registration_website database on phpmyadmin

    // create table Users(
    // username varchar(40) primary key,
    // email text ,
    // fullname text ,
    // password text,
    // address text ,
    // phone text,
    // imageName varchar(40),
    // birthdate Date)

    use HasFactory;
}
