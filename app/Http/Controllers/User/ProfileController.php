<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Providers\AppServiceProvider;
use Carbon\Carbon;
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
        $this->middleware('auth:users');
//直接別ユーザーにアクセスするとはじくシステム
        $this->middleware(function($request,$next){
            $id=$request->route()->parameter('profile');
            if(!is_null($id)){
                $userId=User::findOrFail($id)->id;
                $currentUserId=(int)$userId;
                $authId=Auth::id();
                if($currentUserId!==$authId){
                    abort(404);
                }
            }
            return $next($request);
        });

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
        $userProfile=User::findOrFail($id);

        return view('user.profiles.show', compact('userProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    public function update(Request $request, $id)
    {
        dd($request);
        $userProfile = User::findOrFail($id);
        $imageFile=$request->image;
        dd($imageFile);
        if(!is_null($imageFile)&&$imageFile->isValid()){
        Storage::putFile('public/profiles',$imageFile);

        }
        return redirect()->route('user.profiles.show',['profile' => $userProfile->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
