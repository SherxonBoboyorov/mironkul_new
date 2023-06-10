<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Portfolio2;
use App\Models\PortfolioImage2;
use App\Models\PortfolioVideo2;
use Illuminate\Http\Request;

class Partfolio3Controller extends Controller
{
    public function portfolios3()
    {
        $portfolio2s = Portfolio2::orderBy('id')->get();
        return view('front.SandwichPortfolio3', compact('portfolio2s'));
    }

    public function show($slug)
    {
       $portfolio2 = Portfolio2::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        $portfolioimage2s = PortfolioImage2::where('portfolio2_id', $portfolio2->id)->get();

        $portfoliovideo2s = PortfolioVideo2::where('portfolio2_id', $portfolio2->id)->get();

        return view('front.SandwichPortfolio_in3', compact(
            'portfolio2',
            'portfolioimage2s',
            'portfoliovideo2s'
        ));
    }
}
