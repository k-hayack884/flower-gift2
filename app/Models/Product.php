<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\BadProduct;
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
        'address',
        'trade_type',
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
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
    public function comment()
    {
        return $this->hasOne(Comment::class);
    }
    public function badproduct()
    {
        return $this->hasOne(BadProduct::class);
    }
    public function processedproduct()
    {
        return $this->hasOne(ProcessedProduct::class);
    }
    public function scopeAvailableItems($query)
    {
        Product::with('category')
            ->where('status', 1)
            ->orWhere('status', 2)
            ->orderBy('created_at', 'desc');

        return $query;
    }

    public function scopeSortOrder($query, $sortOrder)
    {
        if ($sortOrder === null || $sortOrder === \Constant::ORDER_LIST['later']) {
            return $query->where('status', 1)
            ->orWhere('status', 2)->orderBy('created_at', 'desc');
        }
        if ($sortOrder === \Constant::ORDER_LIST['older']) {
            return $query->where('status', 1)
            ->orWhere('status', 2)->orderBy('created_at', 'asc');
        }
        // if ($sortOrder === \Constant::SORT_ORDER['like']) {
        //     return $query->orderBy('', 'desc');
        // }
        if ($sortOrder === \Constant::ORDER_LIST['sell']) {
            return $query->where('status', 1)->orderBy('created_at', 'desc');
        }
        return $query;
    }

    public function scopeSelectCategory($query, $categoryId)
    {
        if ($categoryId!=='0') {
            return $query->where('products.secondary_category_id', $categoryId);
        } else {
            return;
        }
    }
    public function scopeSearchKeyword($query, $keyword)
    {
        if (!is_null($keyword)) {
            $spaceConvert=mb_convert_kana($keyword, 's'); //全角スペースを半角にする
            $keywords=preg_split('/[\s]+/', $spaceConvert, -1, PREG_SPLIT_NO_EMPTY);
            //[/s]はスペースのエスケープ
            foreach ($keywords as $word) {
                $query->where('products.name', 'like', '%'.$word.'%');
            }
            return $query;
        } else {
            return;
        }
    }
}
