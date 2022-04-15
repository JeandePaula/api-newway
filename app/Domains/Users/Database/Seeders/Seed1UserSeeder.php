<?php

namespace App\Domains\Users\Database\Seeders;

use App\Domains\Users\Models\User;
use Illuminate\Database\Seeder;

class Seed1UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $users = [
            [
                'name' => "Joao",
                'email' => 'contato@joao.com.br',
                'password' => bcrypt('123456')
            ],
            [
                'name' => "maria",
                'email' => 'contato@maria.com.br',
                'password' => bcrypt('123456')
            ]
            ];

        User::insert($users);
    }
}
