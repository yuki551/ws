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
                'password' => '$2y$10$mYBa8MlZubJgfLqUgW/5GuCL2ALw0L3R0o.6HOUz0RX2SwVasySsW',
                'current_team_id' => 1,
                'role_id' => 3,
                'auth_id' => 1,
            ],
            [
                'id' => 3,
                'name' => '営業1テスト部長',
                'email' => 'test2@example.com',
                'password' => '$2y$10$jbwUHgwehXHZ/lDBug/JY.6daa3QsOFY5EXF53rgh7xD8o2SMRmsa',
                'current_team_id' => 3,
                'role_id' => 5,
                'auth_id' => 1,
            ],
            [
                'id' => 4,
                'name' => '営業1テスト',
                'email' => 'test3@example.com',
                'password' => '$2y$10$a.HH4y8b3hk6Pwsd/GPi0.c41TBbbPVMuo7Jp0332vmgpDWy2t4CK',
                'current_team_id' => 3,
                'role_id' => 10,
                'auth_id' => 0,
            ],
            [
                'id' => 5,
                'name' => '営業2テスト',
                'email' => 'test4@example.com',
                'password' => '$2y$10$lOxJuTx0JSOTF4JazJCW9eHu92W1SbK/pC7ZdQNmqRthUBlGJ3RW6',
                'current_team_id' => 4,
                'role_id' => 10,
                'auth_id' => 0,
            ],
            [
                'id' => 6,
                'name' => '総務テスト',
                'email' => 'test5@example.com',
                'password' => '$2y$10$njFN8lO9TKHBUqf55wtqQeQO5jlwvJKQEPktgtOmqsxKUp20kTEw2',
                'current_team_id' => 2,
                'role_id' => 10,
                'auth_id' => 0,
            ],
            [
                'id' => 7,
                'name' => '工務テスト',
                'email' => 'test6@example.com',
                'password' => '$2y$10$5fDQHoYckun/jMHy9cXLduoXkG6yQnr3hNyun7qncd/m1c9VI6yKu',
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
