<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SecondaryCategory;

class Product extends Model
{
    use HasFactory;
    //データベースに登録してくれるすごいやつ
    protected $fillable = [
        'user_id',
        'secondary_category_id',
        'name',
        'comment',
        'img',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(SecondaryCategory::class, 'secondary_category_id');
    }
    public function scopeAvailableItems($query)
    {
        Product::with('category')
            ->where('status', 0)
            ->orWhere('status', 1)
            ->orderBy('created_at', 'desc');

        return $query;
    }

    public function scopeSortOrder($query, $sortOrder)
    {
        if ($sortOrder === null || $sortOrder === \Constant::SORT_ORDER['later']) {
            return $query->orderBy('created_at', 'desc');
        }
        if ($sortOrder === \Constant::SORT_ORDER['older']) {
            return $query->orderBy('created_at', 'asc');
        }
        // if ($sortOrder === \Constant::SORT_ORDER['like']) {
        //     return $query->orderBy('', 'desc');
        // }

        return $query;
    }
}
