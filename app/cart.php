<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
  function relationToProduct()
  {
     return $this->hasOne('App\Product', 'id', 'product_id');
  }
}
