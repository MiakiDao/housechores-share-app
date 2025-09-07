<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members_chores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->CascadeOnDelete();
            $table->foreignId('chore_id')->constrained('chores')->CascadeOnDelete();
            $table->date('assigned_at');
            $table->enum('time_slot', ['morning', 'afternoon', 'evening']);
            $table->integer('price_at_assignment_cents')->unsigned()->default(0);
            $table->enum('status', ['assigned', 'done'])->default('assigned');
            $table->timestamps();

            // 統計用
            // 個人ごとの集計（期間フィルタあり）
            $table->index(['member_id', 'assigned_at']);
            // 家事ごとの集計（期間フィルタあり）
            $table->index(['chore_id', 'assigned_at']);
            // 個人×家事の総回数や合計金額
            $table->index(['member_id', 'chore_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members_chores');
    }
};
