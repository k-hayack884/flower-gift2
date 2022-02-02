<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class BadComment extends Model
{
    protected $fillable = [
        'user_id',
        'reason',
        'comment_id',
        'status'
    ];
    use HasFactory;
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
