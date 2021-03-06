<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PrimaryCategory;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('product');
            if (!is_null($id)) {
                $productId = Product::findOrFail($id)->user_id;
                $currentUserId = (int)$productId;
                $authId = Auth::id();
                if ($currentUserId !== $authId) {
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function view(Request $request)
    {
        $categories = PrimaryCategory::with('secondary')->get();
        $productInfo = Product::availableItems()
            ->selectCategory($request->category ?? '0')
            ->searchKeyword($request->keyword ?? '')
            ->sortOrder($request->sort)->with('category')->paginate(20); //n+1なんとかなた
        return view('user.dashboard', compact('productInfo', 'categories'));
    }

    public function index()
    {
        // dd(env('AWS_ACCESS_KEY_ID'),env('AWS_SECRET_ACCESS_KEY'),env('AWS_DEFAULT_REGION'),env('AWS_BUCKET'),env('AWS_URL'));
        $productInfo = User::with('product.category') //モデルのリレーションのファンクションでつなぐ
            ->where('id', Auth::id())->paginate(10);
        return view('user.products.index', compact('productInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PrimaryCategory::with('secondary')->get();
        return view('user.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $imageFile = $request->file('image');

        if (!is_null($imageFile) && $imageFile->isValid()) {
            // Storage::putFile('public/profiles', $imageFile);//リサイズなし
            $fileNameToStore = ImageService::upload($imageFile, 'products');


        }
        Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'comment' => $request->comment,
            'status' => $request->status,
            'address' => $request->address,
            'trade_type' => $request->trade_type,
            'img' => $fileNameToStore ?? '',
            'secondary_category_id' => $request->category
        ]);
        return redirect()
            ->route('user.products.index')
            ->with([
                'message' => '商品を登録しました',
                'status' => 'info'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productInfo = Product::findOrFail($id);
        if ($productInfo->status === 0) {
            return redirect()
                ->route('user.products.index')
                ->with([
                    'message' => 'この商品は非公開にされています',
                    'status' => 'delete'
                ]);
        }
        $categoryName = Product::findOrFail($id)
            ->join('secondary_categories', 'products.secondary_category_id', '=', 'secondary_categories.id')
            ->join('primary_categories', 'secondary_categories.primary_category_id', '=', 'primary_categories.id')
            ->select('products.id', 'secondary_categories.name AS secondary_name', 'primary_categories.name AS primary_name')
            ->where('products.id', $id)
            ->first();
        // $favorite=Favorite::with('user')->findOrFail($id);

        $userProfile = Product::with('user')->findOrFail($id);
        $comments = Comment::with('user')->where('product_id', $id)->get();
        return view('user.products.show', compact('userProfile', 'productInfo', 'categoryName', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = PrimaryCategory::with('secondary')->get();
        return view('user.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $categories = PrimaryCategory::with('secondary')->get();
        $imageFile = $request->image;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            // Storage::putFile('public/profiles', $imageFile);//リサイズなし
            $fileNameToStore = ImageService::upload($imageFile, 'products');
        }
        $product->name = $request->name;
        $product->comment = $request->comment;
        $product->status = $request->status;
        $product->trade_type = $request->trade_type;
        $product->address = $request->address;
        $product->secondary_category_id = $request->category;
        if (!empty($fileNameToStore)) {
            $product->img = $fileNameToStore;
        }

        $product->save();

        return redirect()
            ->route('user.products.index')
            ->with([
                'message' => '商品を編集しました',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('user.products.index')->with([
            'message' => '商品を削除しました',
            'status' => 'delete'
        ]);
    }
}
