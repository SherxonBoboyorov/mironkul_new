<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Portfoliometal;
use App\Models\PortfoliometalImage;
use App\Models\PortfoliometalVideo;
use Illuminate\Http\Request;

class Partfolio1Controller extends Controller
{
    public function portfolios1()
    {
        $portfoliometals = Portfoliometal::orderBy('id')->get();
        return view('front.SandwichPortfolio1', compact('portfoliometals'));
    }

    public function show($slug)
    {
       $portfoliometal = Portfoliometal::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        $portfoliometalimages = PortfoliometalImage::where('portfoliometal_id', $portfoliometal->id)->get();

        $portfoliometalvideos = PortfoliometalVideo::where('portfoliometal_id', $portfoliometal->id)->get();

        return view('front.SandwichPortfolio_in1', compact(
            'portfoliometal',
            'portfoliometalimages',
            'portfoliometalvideos'
        ));
    }
}
