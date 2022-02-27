<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\User\UserResetPassword;
use App\Models\Product;
use App\Models\Review;
use App\Models\Comment;

// use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'prefecture',
        'comment'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'favorites');
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function badcomment()
    {
        return $this->hasMany(BadComment::class);
    }
}
