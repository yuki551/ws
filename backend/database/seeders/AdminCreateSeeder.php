<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => '$2y$10$AmFnppLmUJP8gKVaWBoqseGNFxAS9J8araGlhjWs/lE/zimjTG5w.',
                'current_team_id' => 1,
                'auth_id' => 1,
                'role_id' => 1,
            ]
        );
    }
}
