<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Leader extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\LeaderFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    // membersに対するリレーションhasMany
    public function members()
    {
        return $this->hasMany(Menmber::class);
    }







    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    // ログイン状態を維持する機能に使うらしい
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // ユーザー登録やパスワード変更のときに、自動でハッシュ化してくれる（ログイン機能つけるなら残す）
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
