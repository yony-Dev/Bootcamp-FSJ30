<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 
        'price', 
        'description'
    ];

    //Ejemplo de Query builder
    public static function getAllProducts(){
        return DB::table('products') -> select('name', 'price', 'description')-> get();
    }

    public static function saveProduct($name, $price, $description){
        return DB::table('products')-> insert([
            'name' => $name,
            'price' => $price,
            'description' => $description
        ]);
    }

}
