<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVideo;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function products()
    {
        $products = Product::orderBy('id')->get();
        return view('front.SandwichProducts', compact('products'));
    }

    public function show($slug)
    {
       $product = Product::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        $productimages = ProductImage::where('product_id', $product->id)->get();

        $productvideos = ProductVideo::where('product_id', $product->id)->get();

        return view('front.SandwichProducts_in', compact(
            'product',
            'productimages',
            'productvideos'
        ));
    }
}
