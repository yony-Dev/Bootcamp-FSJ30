<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('products:get-all', function () {
    $products = App\Models\Product::getAllProducts();
    foreach($products as $product){
        $this->info("Name: {$product->name}, Price: {$product->price}, Description: {$product->description}");
    }
})->describe('Get all products using Query Builder');
