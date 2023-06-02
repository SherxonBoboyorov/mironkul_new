<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\Options;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact() 
    {
        $options = Options::all();
        $offices = Office::orderBy('created_at', 'DESC')->get();
        
        return view('front.contacts', compact(
            'options',
            'offices'
        ));
    }
} 
