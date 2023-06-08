<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Metal;
use App\Models\MetalImage;
use App\Models\MetalVideo;
use Illuminate\Http\Request;

class Blog1Controller extends Controller
{
    public function products1()
    {
        $metals = Metal::orderBy('id')->get();
        return view('front.SandwichProducts1', compact('metals'));
    }

    public function show($slug)
    {
       $metal = Metal::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        $metalimages = MetalImage::where('metal_id', $metal->id)->get();

        $metalvideos = MetalVideo::where('metal_id', $metal->id)->get();

        return view('front.SandwichProducts_in1', compact(
            'metal',
            'metalimages',
            'metalvideos'
        ));
    }
}
