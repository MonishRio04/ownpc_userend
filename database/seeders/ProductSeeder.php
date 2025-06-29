<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Gaming Monitor',
            'description' => '27 inch 144Hz display',
            'price' => 18999,
            'image' => 'products/monitor.jpg'
    ]);

    Product::create([
        'name' => 'Wireless Mouse',
        'description' => 'Ergonomic and fast',
        'price' => 999,
        'image' => 'products/mouse.jpg'
    ]);
}
    
}
