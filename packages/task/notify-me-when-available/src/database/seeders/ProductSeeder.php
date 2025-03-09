<?php

namespace Task\NotifyMeWhenAvailable\Database\Seeders;

use Illuminate\Database\Seeder;
use Task\NotifyMeWhenAvailable\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop',
                'quantity' => 2,
                'price' => 1200
            ],
            [
                'name' => 'Smartphone',
                'quantity' => 1,
                'price' => 800
            ],
            [
                'name' => 'Headphones',
                'quantity' => 0,
                'price' => 150
            ],
            [
                'name' => 'Monitor',
                'quantity' => 5,
                'price' => 300
            ],
            [
                'name' => 'Keyboard',
                'quantity' => 0,
                'price' => 50
            ],
            [
                'name' => 'Mouse',
                'quantity' => 4,
                'price' => 30
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
