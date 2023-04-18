<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * We will use this seeder to insert some of the default statuses we can use
         * These will be outlined as below
         */

        DB::table('statuses')->insert([
            [
                'id' => 1,
                'name' => 'Draft',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Active',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Pending',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'Suspended',
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
