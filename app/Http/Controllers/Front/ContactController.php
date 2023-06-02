<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Office;
use App\Models\Options;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact() 
    {
        $options = Options::orderBy('created_at', 'DESC')->get();
        $offices = Office::orderBy('created_at', 'DESC')->get();

        return view('front.contacts', compact(
            'options',
            'offices'
        ));
    }

           /**
     * @throws ValidationException
     */
    public function yourSave(Request $request): RedirectResponse
    {
        $data =  $request->validate([
            'fullname' => 'required',
            'phone' => 'required',
            'comment' => 'required'
       ]);

       Feedback::create($data);
       
         dd($data);
       return back()->with('message', 'unable to sending');

    }
} 
