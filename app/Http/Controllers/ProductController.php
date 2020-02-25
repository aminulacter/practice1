<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Comment;

class ProductController extends Controller
{
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //dd($product->wherePivot('ratings', '>', 1));
        // $product->setRatings();
        // $users = $product->users()->get();

        // foreach ($users as $user) {
        //     dump($user->pivot->rating);
        // }
        $comments = $product->comments()->whereNull('comment_id')
            ->with('user')
            ->with('commentReplies')
            ->get();

        $ratingComments = $comments->filter(function ($comment, $key) {
            return $comment->ratingComment == 1;
        });
        $vendor = $product->vendor();
        return view('product', compact('product', 'comments', 'ratingComments', 'vendor'));
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
