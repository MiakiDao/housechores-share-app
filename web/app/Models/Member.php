<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    
    protected $fillable = [
        'name',
        'leader_id',
        'balance_cents',
    ];

    // leadersに対するリレーションbelongsTo
    public function leader()
    {
        return $this->belongsTo(Leader::class);
    }

    // choresに対するリレーションbelongsToMany
    public function chores()
    {
        return $this->belongsToMany(Chore::class, 'members_chores', 'member_id', 'chore_id');
    }
}
