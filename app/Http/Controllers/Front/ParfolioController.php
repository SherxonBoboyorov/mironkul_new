<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use App\Models\PortfolioVideo;
use Illuminate\Http\Request;

class ParfolioController extends Controller
{
    public function portfolios()
    {
        $portfolios = Portfolio::orderBy('id')->get();
        return view('front.SandwichPortfolio', compact('portfolios'));
    }

    public function show($slug)
    {
       $portfolio = Portfolio::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        $portfolioimages = PortfolioImage::where('portfolio_id', $portfolio->id)->get();

        $portfoliovideos = PortfolioVideo::where('portfolio_id', $portfolio->id)->get();

        return view('front.SandwichPortfolio_in', compact(
            'portfolio',
            'portfolioimages',
            'portfoliovideos'
        ));
    }
}
