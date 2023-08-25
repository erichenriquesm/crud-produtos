<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Product 1',
                'value' => 19.99,
                'description' => 'Description for Product 1',
            ],
            [
                'name' => 'Product 2',
                'value' => 29.99,
                'description' => 'Description for Product 2',
            ],
            // Adicione mais produtos conforme necessário
        ];

        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
