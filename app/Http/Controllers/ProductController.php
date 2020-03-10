<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Comment;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;
use App\LicenseType;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('product.create1', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "categories" => 'required',
            "images" => 'required',
            "files" => 'required',
            "browsers" => 'required',
            "tags" => 'required',
            ]);
        $product = new Product();
        $slug = Str::slug($request->name, '-');
        //dd('aminul');
        $product->name = $request->name;
        // dd('aminul');

        $product->slug = $slug;
        // dd('aminul');

        $product->user_id = auth()->user()->id;
        // dd('aminul');
        $product->details  = $request->description;
        $product->description = $request->description;
        // dd('aminul');

        $product->image = $request->image;
        //dd('aminul');

        $product->images = $request->images;
        $product->files_included = $request->files_included;
        $product->images = $request->browsers;
        $product->version = $request->version;
        //dd('aminul');

        //$product->images = $browsers->browsers;
        $product->retina_ready = $request->retina === 'yes'? true : false ;
        

        //dd($product);

        $product->save();
        


        $product->categories()->sync(explode(',', $request->categories));
        $product->tags()->sync(explode(',', $request->tags));
        $licensetype = ["regularlicense", "extendlicense", "SingleSiteLicense","2SiteLicense","MultipleLicense"];
        foreach ($licensetype as $license) {
            if ($request->has($license)) {
                $newLicense = new LicenseType(['type' => $license, 'price' => $request->$license]);
                $product->licences_types()->save($newLicense);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // $product = Product::with(['user', 'users', 'categories'])->find($id);
        //dd($product->ratingcounts);
        $comments = $product->comments()->whereNull('comment_id')
            ->with('user')
            ->with('commentReplies')
            ->get();


        $ratingComments = $comments->filter(function ($comment, $key) {
            return $comment->ratingComment == 1;
        });
        $vendor = $product->vendor();
        return view('product.show', compact('product', 'comments', 'ratingComments', 'vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
