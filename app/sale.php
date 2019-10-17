<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    function relationtobilling()
    {
      return $this->hasOne('App\billing', 'id', 'billing_id');
    }
}
