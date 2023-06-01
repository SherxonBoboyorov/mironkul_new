<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Photo;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutCompany()
    {
        $pages = Page::all();
        return view('front.aboutCompany', compact('pages'));
    }

    public function aboutCompanyPhoto() {

        $photos = Photo::orderBy('created_at', 'DESC')->get();
        return view('front.aboutCompanyFoto', compact(
            'photos'
        ));
    }

    public function show($slug) {
        $photo = Photo::where('slug_uz', $slug)
        ->orWhere('slug_ru', $slug)
        ->orWhere('slug_en', $slug)
        ->first();

        $photos = Photo::orderBy('created_at', 'DESC')->get();

        return view('front.aboutCompanyFoto_in', compact('photo', 'photos'));
    }
}
