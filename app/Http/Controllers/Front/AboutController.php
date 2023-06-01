<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Photo;
use App\Models\Presentation;
use App\Models\Video;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutCompany()
    {
        $pages = Page::all();
        return view('front.aboutCompany', compact('pages'));
    }

    public function aboutCompanyPhoto() 
    {

        $photos = Photo::orderBy('created_at', 'DESC')->get();
        $pages = Page::all();
        return view('front.aboutCompanyFoto', compact(
            'photos',
            'pages'
        ));
    }

    public function show($slug) 
    {
        $photo = Photo::where('slug_uz', $slug)
        ->orWhere('slug_ru', $slug)
        ->orWhere('slug_en', $slug)
        ->first();

        $photos = Photo::orderBy('created_at', 'DESC')->get();
        $pages = Page::all();

        return view('front.aboutCompanyFoto_in', compact('photo', 'photos', 'pages'));
    }


    public function aboutCompanyVideo() 
    {

        $videos = Video::orderBy('created_at', 'DESC')->get();
        $pages = Page::all();
        return view('front.aboutCompanyVideo', compact(
            'videos',
            'pages'
        ));
    }


    public function aboutCompanyPresentation() 
    {
        $presentations = Presentation::orderBy('created_at', 'DESC')->get();
        return view('front.aboutCompanyPresentation', compact('presentations'));
    }

}
