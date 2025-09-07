<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('leaders')->insert([
            ['name' => 'リーダー1', 'email' => 'leader1@example.com', 'password' => Hash::make('password'), 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
