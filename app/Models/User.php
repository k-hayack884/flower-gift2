<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;
use App\Models\Review;
use App\Models\Comment;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'favorites');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
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
