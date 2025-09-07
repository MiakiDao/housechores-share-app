<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChoreSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('chores')->insert([
            ['name' => 'ごみ出し', 'price_cents' => 10000, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '皿洗い',   'price_cents' => 20000, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '洗濯',     'price_cents' => 30000, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '掃除機',   'price_cents' => 15000, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
