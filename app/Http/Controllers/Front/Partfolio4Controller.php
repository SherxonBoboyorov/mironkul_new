<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Portfolio3;
use App\Models\PortfolioImage3;
use App\Models\PortfolioVideo3;
use Illuminate\Http\Request;

class Partfolio4Controller extends Controller
{
    public function portfolios4()
    {
        $portfolio3s = Portfolio3::orderBy('id')->get();
        return view('front.SandwichPortfolio4', compact('portfolio3s'));
    }

    public function show($slug)
    {
       $portfolio3 = Portfolio3::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        $portfolioimage3s = PortfolioImage3::where('portfolio3_id', $portfolio3->id)->get();

        $portfoliovideo3s = PortfolioVideo3::where('portfolio3_id', $portfolio3->id)->get();

        return view('front.SandwichPortfolio_in4', compact(
            'portfolio3',
            'portfolioimage3s',
            'portfoliovideo3s'
        ));
    }
}
