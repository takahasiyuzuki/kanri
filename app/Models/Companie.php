<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    //

    //
    protected $table = 'companies';
    protected $fillable = 
    [
        'id',
        'company_name',
        'street_address',
        'representative_name'

    ];


public function products()
    {
        return $this->hasMany('App\Models\Product');
    }


}
