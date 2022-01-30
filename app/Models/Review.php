<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'reviewer_id',
        'reviewee_id',
        'review',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeGoodReview($query, $id)
    {
        $good=Review::with('user')
        ->select('review')
        ->where('reviewee_id', $id)
        ->where('review', 1)->count();
        return $good;
    }
    public function scopeNormalReview($query, $id)
    {
        $normal=Review::with('user')
        ->select('review')
        ->where('reviewee_id', $id)
        ->where('review', 2)
        ->count();
       
        return $normal;
    }
    public function scopeBadReview($query, $id)
    {
        $bad=Review::with('user')
        ->select('review')
        ->where('reviewee_id', $id)
        ->where('review', 3)->count();
     
        return $bad;
    }
}
