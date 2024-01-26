<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = json_decode(file_get_contents(
            __DIR__ . '/../../resources/expected algolia payload.json'
        ), true);
        
        $products = array_map(function ($product) {
            $product['categories'] = implode(',', $product['categories']);
            $product['hierarchicalCategories'] = implode(',', $product['hierarchicalCategories']);
            Product::create($product);
            echo 'Created product ' . $product['name'] . PHP_EOL;
        }, $products);
    }
}
