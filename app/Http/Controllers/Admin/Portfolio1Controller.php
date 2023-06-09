<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolio1;
use App\Http\Requests\Admin\UpdatePortfolio1;
use App\Models\Portfolio1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Portfolio1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio1s = Portfolio1::orderBy('id')->paginate(12);
        return view('admin.portfolio1.index', compact('portfolio1s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolio1  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolio1 $request)
    {
        $data = $request->all();
        $data['image'] = Portfolio1::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Portfolio1::create($data)) {
            return redirect()->route('portfolio1.index')->with('message', "Portfolio created seccessfully");
        }
        return redirect()->route('portfolio1.index')->with('message', "unable to created Portfolio");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio1 = Portfolio1::find($id);
        return view('admin.portfolio1.edit', compact('portfolio1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Portfolio1::find($id)) {
            return redirect()->route('portfolio1.index')->with('message', "Portfolio not fount");
        }

        $portfolio1 = Portfolio1::find($id);

        $data = $request->all();
        $data['image'] = Portfolio1::updateImage($request, $portfolio1);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($portfolio1->update($data)) {
            return redirect()->route('portfolio1.index')->with('message', "Portfolio changed successfully");
        }
        return redirect()->route('portfolio1.index')->with('message', "Unable to update Portfolio");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Portfolio1::find($id)) {
            return redirect()->route('portfolio1.index')->with('message', "Portfolio not found");
        }

        $portfolio1 = Portfolio1::find($id);

        if (File::exists(public_path() . $portfolio1->image)) {
            File::delete(public_path() . $portfolio1->image);
        }

        if ($portfolio1->delete()) {
            return redirect()->route('portfolio1.index')->with('message', "Portfolio deleted successfully");
        }
        return redirect()->route('portfolio1.index')->with('message', "unable to delete Portfolio");
    }
}
