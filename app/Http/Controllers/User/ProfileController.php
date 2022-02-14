<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;
use Carbon\Carbon;
use InterventionImage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    }

    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $good=Review::goodReview($id);
        $normal=Review::normalReview($id);
        $bad=Review::badReview($id);
        $userProfile=User::findOrFail($id);

        return view('user.profiles.show', compact('userProfile', 'good', 'normal', 'bad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id) //リクエスト入れる
    {
        $id=$request->route()->parameter('profile');
        if (!is_null($id)) {
            $userId=User::findOrFail($id)->id;
            $currentUserId=(int)$userId;
            $authId=Auth::id();
            if ($currentUserId!==$authId) {
                abort(404);
            }
        }
        
        $userProfile = User::findOrFail($id);

        return view('user.profiles.edit', compact('userProfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadImageRequest $request, $id)
    {
        $id=$request->route()->parameter('profile');
        if (!is_null($id)) {
            $userId=User::findOrFail($id)->id;
            $currentUserId=(int)$userId;
            $authId=Auth::id();
            if ($currentUserId!==$authId) {
                abort(404);
            }
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'comment' => [ 'string', 'max:200'],
            'password' => ['required', 'confirmed','string', Password::defaults()],
            'prefecture' => ['string', 'max:50'],
            'comment' => ['string', 'max:100'],
        ]);
        $userProfile = User::findOrFail($id);
        $imageFile=$request->image;
        if (!is_null($imageFile)&&$imageFile->isValid()) {
            // Storage::putFile('public/profiles', $imageFile);//リサイズなし
            $fileNameToStore=ImageService::upload($imageFile, 'profiles');
        }
        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->comment=$request->comment;
        $user->prefecture=$request->prefecture;
        $user->password=Hash::make($request->password);
        if (!is_null($imageFile)&&$imageFile->isValid()) {
            $user->img=$fileNameToStore;
        }
        
        $user->save();
        
        return redirect()
        ->route('user.profiles.show', ['profile' => $userProfile->id])
        ->with(['message'=>'ユーザーを編集しました',
        'status'=> 'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->middleware('auth:users');
        //直接別ユーザーにアクセスするとはじくシステム
        $this->middleware(function ($request, $next) {
            $id=$request->route()->parameter('profile');
            if (!is_null($id)) {
                $userId=User::findOrFail($id)->id;
                $currentUserId=(int)$userId;
                $authId=Auth::id();
                if ($currentUserId!==$authId) {
                    abort(404);
                }
            }
            return $next($request);
        });
        
        try {
            DB::transaction(function () use ($id) {
                Product::select('id', )
                ->where('user_id', Auth::id())->delete();
                
                User::select('id', 'name')
                ->where('id', Auth::id())->delete();
            }, 2); //試行する回数
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        Auth::guard('users')->logout();
        return redirect('/')->with(['message'=>'ユーザーを削除しました',
        'status'=> 'delete']);;
    }
}
