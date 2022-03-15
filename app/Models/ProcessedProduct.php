<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class ProcessedProduct extends Model 
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'result',
        'product_id'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
