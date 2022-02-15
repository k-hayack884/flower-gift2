<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\BadComment;
use App\Models\ProcessedComment;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'comment',
        'product_id',
        'status'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function badcomment()
    {
        return $this->hasMany(BadComment::class);
    }

    public function processedcomment()
    {
        return $this->hasMany(ProcessedComment::class);
    }
}
