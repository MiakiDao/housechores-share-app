<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('members')->insert([
            ['name' => 'メンバー1', 'leader_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'メンバー2', 'leader_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'メンバー3', 'leader_id' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
