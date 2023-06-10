<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product1;
use App\Models\ProductImage1;
use App\Models\ProductVideo1;
use Illuminate\Http\Request;

class Blog2Controller extends Controller
{
    public function products2()
    {
        $product1s = Product1::orderBy('id')->get();
        return view('front.SandwichProducts2', compact('product1s'));
    }

    public function show($slug)
    {
       $product1 = Product1::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        $productimage1s = ProductImage1::where('product1_id', $product1->id)->get();

        $productvideo1s = ProductVideo1::where('product1_id', $product1->id)->get();

        return view('front.SandwichProducts_in2', compact(
            'product1',
            'productimage1s',
            'productvideo1s'
        ));
    }
}
