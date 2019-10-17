<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use SoftDeletes;
  protected $fillable = ['product_name', 'product_price', 'product_details', 'product_quantity', 'alert_quantity', 'created_at', 'product_image'];

  function relationToCatagory()
  {
     return $this->hasOne('App\category', 'id', 'category_id');
  }
}
