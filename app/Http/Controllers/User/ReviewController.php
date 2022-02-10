<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\BadComment;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Providers\AppServiceProvider;
use App\Http\Requests\UploadImageRequest;
use App\Http\Requests\ProductRequest;
use App\Services\ImageService;
use Carbon\Carbon;
use InterventionImage;
use Illuminate\Validation\Rules\Password;

class ReviewController extends Controller
{
    public function good()
    {
        # code...
    }
    public function normal()
    {
        # code...
    }
    public function bad()
    {
        # code...
    }

}
