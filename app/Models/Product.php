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
}
