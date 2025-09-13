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
            ['name' => 'ごみ出し', 'price_cents' => 10000, 'is_favorite' => true, 'img_path' => 'images/chores/takingout_trash.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '皿洗い',   'price_cents' => 20000, 'is_favorite' => false, 'img_path' => 'images/chores/washing_dish.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '洗濯',     'price_cents' => 30000, 'is_favorite' => true, 'img_path' => 'images/chores/laundry.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '掃除機',   'price_cents' => 15000, 'is_favorite' => false, 'img_path' => 'images/chores/vaccuming.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '料理',     'price_cents' => 50000, 'is_favorite' => true, 'img_path' => 'images/chores/cooking.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '買い物',   'price_cents' => 25000, 'is_favorite' => false, 'img_path' => 'images/chores/shopping.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => '庭掃除',   'price_cents' => 40000, 'is_favorite' => true, 'img_path' => 'images/chores/gardening.png', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'ペットの世話', 'price_cents' => 35000, 'is_favorite' => false, 'img_path' => 'images/chores/caring_pet.png', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
