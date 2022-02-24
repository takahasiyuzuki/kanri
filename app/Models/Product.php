<?php

namespace App\Models;

use App\Models\Companie;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = 
[
            'id',
            'products',
            'company_id',
            'product_name',
            'price',
            'stock',
           'img_path',
           'comment'


           

];
public function companies()
  {
    return $this->belongsTo('App\Models\Companie','companie_id');
  }

}
