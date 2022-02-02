<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class BadProduct extends Model
{
    protected $fillable = [

        'user_id',
        'reason',
        'product_id',
        'status'
    ];
    use HasFactory;
    public function product()
    {
        
        return $this->belongsTo(Product::class);
    }
}
