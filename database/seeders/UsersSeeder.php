<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            ['id' => 1, 'username' => 'admin', 'email' => 'tomeksz104@gmail.com', 'display_username' => 'tomeksz104', 'password' => '$2y$10$DXJqeS3Okl3XX2rsve287eRfi0ezG0OltOqrt610AJVDZyPw.4MkK', 'role' => UserRole::ADMIN, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
