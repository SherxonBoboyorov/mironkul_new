<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product3;
use App\Models\ProductImage3;
use App\Models\ProductVideo3;
use Illuminate\Http\Request;

class Blog4Controller extends Controller
{
    public function products4()
    {
        $product3s = Product3::orderBy('id')->get();
        return view('front.SandwichProducts4', compact('product3s'));
    }

    public function show($slug)
    {
       $product3 = Product3::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        $productimage3s = ProductImage3::where('product3_id', $product3->id)->get();

        $productvideo3s = ProductVideo3::where('product3_id', $product3->id)->get();

        return view('front.SandwichProducts_in4', compact(
            'product3',
            'productimage3s',
            'productvideo3s'
        ));
    }
}
