<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * We will be using this seeder to create our admin user.
         */
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Steven Maina',
                'email_address' => 'maichstivo254@gmail.com',
                'password' => bcrypt('$marT#123.'),
                'created_at' => Carbon::now(),
                'email_verified_at' => Carbon::now(),
            ]
        ]);
    }
}
