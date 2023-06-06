<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Options;
use App\Models\Product;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;


class IndexController extends Controller
{
    public function homepage() 
    {

        Meta::setTitle(Options::where('key', 'meta_title_' . LaravelLocalization::getCurrentLocale())->first()->value);
        Meta::setDescription(Options::where('key', 'meta_description_' . LaravelLocalization::getCurrentLocale())->first()->value);

        $categories = Category::orderBy('id')->get();
       
        return view('front.index', [
            'categories' => $categories
        ]);
    }
}
