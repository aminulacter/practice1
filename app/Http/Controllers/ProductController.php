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
        return view('product.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        // dd(licenseType('SingleSiteLicense'));
        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "categories" => 'required',
            "images" => 'required',
            "files_included" => 'required',
            "browsers" => 'required',
            "tags" => 'required',
        ]);
        $product = new Product();
        $slug = Str::slug($request->name, '-');

        $product->name = $request->name;
        $product->slug = $slug;
        $product->user_id = auth()->user()->id;
        $product->details  = $request->description;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->images = $request->images;
        $product->files_included = $request->files_included;
        $product->responsive = $request->responsive == "1"? true: false;
        $product->browser = $request->browsers;
        $product->version = $request->version;
        $product->dimension = $request->dimension;
        $product->retina_ready = $request->retina === 'yes' ? true : false;
        $product->save();


        foreach (explode(',', $request->categories) as $category) {
            $product->categories()->attach(Category::where('name', $category)->first()->id);
        }
        foreach (explode(',', $request->tags) as $tag) {
            $product->tags()->attach(Tag::where('name', $tag)->first()->id);
        }

        // $licensetype = [
        // "regularlicense" => "Regular License",
        //  "extendlicense" => "Extended License",
        //  "SingleSiteLicense" => "Single Site License",
        //  "2SiteLicense" => "2 Site License",
        //  "MultipleLicense" => "Multiple License"];
        
        // dd($request->SingleSiteLicense);
        $licensetype = [
        "regularlicense",
         "extendlicense",
         "SingleSiteLicense",
         "2SiteLicense",
         "MultipleLicense",
          ];

        // foreach ($licensetype as $license => $value) {
        //     if ($request->has($license) && $request->$license) {
        //         $newLicense = new LicenseType(['type' => $value, 'price' => $request->$license]);
                
        //         $product->licences_types()->save($newLicense);
        //     }
        // }
        foreach ($licensetype as $license) {
            if ($request->has($license) && $request->$license) {
                $newLicense = new LicenseType(['type' => $license, 'price' => $request->$license]);
                        
                $product->licences_types()->save($newLicense);
            }
        }
        return redirect()->route('products.show', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $comments = $product->comments()->whereNull('comment_id')
            ->with('user')
            ->with('commentReplies')
            ->get();


        $ratingComments = $comments->filter(function ($comment, $key) {
            return $comment->ratingComment == 1;
        });
        $licenses = $product->licences_types()->orderBy('price')->get();
        $vendor = $product->vendor();
        return view('product.show', compact('product', 'comments', 'ratingComments', 'vendor', 'licenses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       
        $categories = Category::all();
        $tags = Tag::all();
        $selectedTags = $product->tags->pluck('name');
        $selectedCategory = $product->categories->pluck('name');
        $files_included = explode(',', $product->files_included);
        $browser = explode(',', $product->browser);
        // dd($files_included);
        return view('product.edit', compact('product', 'categories', 'tags', 'selectedTags', 'selectedCategory', 'files_included', 'browser'));
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
       //dd($request->retina);
        $request->validate([
            "name" => 'required',
            "description" => 'required',
            "categories" => 'required',
            "images" => 'required',
            "files_included" => 'required',
            "browsers" => 'required',
            "tags" => 'required',
        ]);
      
        $slug = Str::slug($request->name, '-');

        $product->name = $request->name;
        $product->slug = $slug;
        $product->user_id = auth()->user()->id;
        $product->details  = $request->description;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->images = $request->images;
        $product->files_included = $request->files_included;
        $product->responsive = $request->responsive == "1"? true: false;
        $product->browser = $request->browsers;
        $product->version = $request->version;
        $product->dimension = $request->dimension;
        $product->retina_ready = $request->retina == '1' ? true : false;
        $product->save();

        /*updating Category Information */
        $syncCategory=[];
        foreach (explode(',', $request->categories) as $category) {
            // $product->categories()->attach(Category::where('name', $category)->first()->id);
            array_push($syncCategory, Category::where('name', $category)->first()->id);
        }
        $product->categories()->sync($syncCategory);

        /*updating Tag Information */
        $syncTags=[];
        foreach (explode(',', $request->tags) as $tag) {
            //$product->tags()->attach(Tag::where('name', $tag)->first()->id);
            //dd($tag);
            array_push($syncTags, Tag::where('name', $tag)->first()->id);
        }
        $product->tags()->sync($syncTags);

        /*updating License Information */
        $licensetype = [
        "regularlicense",
         "extendlicense",
         "SingleSiteLicense",
         "2SiteLicense",
         "MultipleLicense",
          ];

        /* To update license first we have to take all previous license save to an array then to compare it to
        new array of license type then delete the values which is not present  in new array*/
        $licenseArray = $product->licences_types()->pluck('id');
        $newLicenseArray=[];
        foreach ($licensetype as $license) {
            if ($request->has($license) && $request->$license) {
                $editLicense = LicenseType::where('type', $license)->first();
                if ($editLicense) {
                    $editLicense->price = $request->$license;
                    $editLicense->save();
                } else {
                    $editLicense = new LicenseType(['type' => $license, 'price' => $request->$license]);
                    $product->licences_types()->save($editLicense);
                }
                array_push($newLicenseArray, $editLicense->id);
            }
        }
        
        $licenseToDelete = array_diff($licenseArray->toArray(), $newLicenseArray);
        foreach ($licenseToDelete as $license) {
            LicenseType::find($license)->delete();
        }
        return redirect()->route('products.show', $product);
        
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
