<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class MemberChoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $chores = Chore::all();
        $members = Member::all();

        // 最初の3つの割り当てを具体的に指定
        // 注意: member_id と chore_id が存在することを前提とします。
        $members->firstWhere('id', 1)->chores()->attach(
            $chores->firstWhere('id', 1)->id,
            [
                'assigned_at' => Carbon::now(),
                'time_slot' => 'morning',
                'price_at_assignment_cents' => $chores->firstWhere('id', 1)->price_cents,
                'status' => 'assigned',
            ]
        );

        $members->firstWhere('id', 2)->chores()->attach(
            $chores->firstWhere('id', 2)->id,
            [
                'assigned_at' => Carbon::now(),
                'time_slot' => 'afternoon',
                'price_at_assignment_cents' => $chores->firstWhere('id', 2)->price_cents,
                'status' => 'assigned',
            ]
        );

        $members->firstWhere('id', 3)->chores()->attach(
            $chores->firstWhere('id', 3)->id,
            [
                'assigned_at' => Carbon::now(),
                'time_slot' => 'evening',
                'price_at_assignment_cents' => $chores->firstWhere('id', 3)->price_cents,
                'status' => 'assigned',
            ]
        );
    }
}
