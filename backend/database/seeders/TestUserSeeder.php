<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 2,
                'name' => 'テスト社長',
                'email' => 'test1@example.com',
                'password' => '$2y$10$mVGNeHxWWqRWYXsRDJpx3eWpm1EH0/S7nygEPLIZrrwXt6UcaGai6',
                'current_team_id' => 1,
                'role_id' => 3,
                'auth_id' => 1,
            ],
            [
                'id' => 3,
                'name' => '営業1テスト部長',
                'email' => 'test2@example.com',
                'password' => '$2y$10$mVGNeHxWWqRWYXsRDJpx3eWpm1EH0/S7nygEPLIZrrwXt6UcaGai6',
                'current_team_id' => 3,
                'role_id' => 5,
                'auth_id' => 1,
            ],
            [
                'id' => 4,
                'name' => '営業1テスト',
                'email' => 'test3@example.com',
                'password' => '$2y$10$mVGNeHxWWqRWYXsRDJpx3eWpm1EH0/S7nygEPLIZrrwXt6UcaGai6',
                'current_team_id' => 3,
                'role_id' => 10,
                'auth_id' => 0,
            ],
            [
                'id' => 5,
                'name' => '営業2テスト',
                'email' => 'test4@example.com',
                'password' => '$2y$10$mVGNeHxWWqRWYXsRDJpx3eWpm1EH0/S7nygEPLIZrrwXt6UcaGai6',
                'current_team_id' => 4,
                'role_id' => 10,
                'auth_id' => 0,
            ],
            [
                'id' => 6,
                'name' => '総務テスト',
                'email' => 'test5@example.com',
                'password' => '$2y$10$mVGNeHxWWqRWYXsRDJpx3eWpm1EH0/S7nygEPLIZrrwXt6UcaGai6',
                'current_team_id' => 2,
                'role_id' => 10,
                'auth_id' => 0,
            ],
            [
                'id' => 7,
                'name' => '工務テスト',
                'email' => 'test6@example.com',
                'password' => '$2y$10$mVGNeHxWWqRWYXsRDJpx3eWpm1EH0/S7nygEPLIZrrwXt6UcaGai6',
                'current_team_id' => 5,
                'role_id' => 10,
                'auth_id' => 0,
            ],
        ]);
        DB::table('clients')->insert([
            [
                'id' => 1,
                'name' => '創造社',
            ],
            [
                'id' => 2,
                'name' => 'テストA社',
            ],
        ]);
    }
}
