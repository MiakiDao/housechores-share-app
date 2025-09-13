<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chore extends Model
{
    protected $fillable = [
        'name',
        'price_cents',
        'is_favorite',
        'img_path',
    ];

    // membersに対するリレーションbelongsToMany
    public function members()
    {
        return $this->belongsToMany(Member::class, 'members_chores', 'chore_id', 'member_id');
    }

    // よくやる家事スコープ(assignment.bladeで使用)
    public function scopeFavorite($q){ return $q->where('is_favorite', true); }
}
