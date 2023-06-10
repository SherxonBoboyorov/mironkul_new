<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Portfolio1;
use App\Models\PortfolioImage1;
use App\Models\PortfolioVideo1;
use Illuminate\Http\Request;

class Partfolio2Controller extends Controller
{
    public function portfolios2()
    {
        $portfolio1s = Portfolio1::orderBy('id')->get();
        return view('front.SandwichPortfolio2', compact('portfolio1s'));
    }

    public function show($slug)
    {
       $portfolio1 = Portfolio1::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        $portfolioimage1s = PortfolioImage1::where('portfolio1_id', $portfolio1->id)->get();

        $portfoliovideo1s = PortfolioVideo1::where('portfolio1_id', $portfolio1->id)->get();

        return view('front.SandwichPortfolio_in2', compact(
            'portfolio1',
            'portfolioimage1s',
            'portfoliovideo1s'
        ));
    }
}
