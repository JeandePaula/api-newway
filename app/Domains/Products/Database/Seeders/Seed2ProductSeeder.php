<?php

namespace App\Domains\Products\Database\Seeders;

use App\Domains\Products\Models\Product;
use Illuminate\Database\Seeder;

class Seed2ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $products = [
            [
                "name" => "Homem Aranha",
                "type_id" => 1
            ],
            [
                "name" => "Doutor Estranho",
                "type_id" => 1
            ],
            [
                "name" => "Viúva Negra",
                "type_id" => 1
            ]
            ];

            Product::insert($products);
    }
}
