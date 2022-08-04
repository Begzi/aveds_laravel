<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = ['fullname', 'email', 'photo', 'age', 'avarage_salary', 'environment']; // то что можно массого вводить, белый список
}
