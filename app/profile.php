<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = ['first_name','last_name','address','phone','zip_code'];
}
