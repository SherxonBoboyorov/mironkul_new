<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutCompany()
    {
        $pages = Page::all();
        return view('front.aboutCompany', compact('pages'));
    }
}
