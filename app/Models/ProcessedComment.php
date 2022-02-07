<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Comment;


class ProcessedComment extends Model
{
    protected $fillable = [
        'admin_id',
        'result',
        'comment_id'

    ];
    use HasFactory;
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
