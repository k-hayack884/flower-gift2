<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;


class ProcessedComment extends Model
{
    protected $fillable = [
        'admin_id',
        'result',

    ];
    use HasFactory;
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
