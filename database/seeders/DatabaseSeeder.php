<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeders = glob('app/domains/*/*/*/*Seeder.php');

        foreach ($seeders as $seeder) 
        {
            $seeder = str_replace(['app/domains','/','.php'], ['\App\Domains','\\',''], $seeder);
            $this->call($seeder);
        }
    }
}
