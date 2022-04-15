<?php

namespace App\Domains\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Seed3RankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 

        DB::select('INSERT INTO `product_ranking` (`product_id`,`votes`) VALUES (3, 5);');
    }
}
