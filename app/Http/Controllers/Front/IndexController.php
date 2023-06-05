<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function homepage() 
    {
        $categories = Category::orderBy('id')->get();
       
        return view('front.index', [
            'categories' => $categories,
        ]);
    }
}
