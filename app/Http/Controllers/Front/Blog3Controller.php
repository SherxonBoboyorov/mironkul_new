<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product2;
use App\Models\ProductImage2;
use App\Models\ProductVideo2;
use Illuminate\Http\Request;

class Blog3Controller extends Controller
{
    public function products3()
    {
        $product2s = Product2::orderBy('id')->get();
        return view('front.SandwichProducts3', compact('product2s'));
    }

    public function show($slug)
    {
       $product2 = Product2::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        $productimage2s = ProductImage2::where('product2_id', $product2->id)->get();

        $productvideo2s = ProductVideo2::where('product2_id', $product2->id)->get();

        return view('front.SandwichProducts_in3', compact(
            'product2',
            'productimage2s',
            'productvideo2s'
        ));
    }
}
