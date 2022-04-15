<?php

namespace App\Domains\Products\Database\Seeders;

use App\Domains\Products\Models\Type;
use Illuminate\Database\Seeder;

class Seed1TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $types = [
            [
                "name" => "Movies"
            ],
            [
                "name" => "Animes"
            ]
            ];

        Type::insert($types);
    }
}
