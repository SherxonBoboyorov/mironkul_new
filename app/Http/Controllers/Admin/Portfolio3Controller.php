<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolio3;
use App\Http\Requests\Admin\UpdatePortfolio3;
use App\Models\Portfolio3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Portfolio3Controller extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio3s = Portfolio3::orderBy('id')->paginate(12);
        return view('admin.portfolio3.index', compact('portfolio3s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio3.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolio3  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolio3 $request)
    {
        $data = $request->all();
        $data['image'] = Portfolio3::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Portfolio3::create($data)) {
            return redirect()->route('portfolio3.index')->with('message', "Portfolio created seccessfully");
        }
        return redirect()->route('portfolio3.index')->with('message', "unable to created Portfolio");
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
        $portfolio3 = Portfolio3::find($id);
        return view('admin.portfolio3.edit', compact('portfolio3'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfolio3  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolio3 $request, $id)
    {
        if (!Portfolio3::find($id)) {
            return redirect()->route('portfolio3.index')->with('message', "Portfolio not fount");
        }

        $portfolio3 = Portfolio3::find($id);

        $data = $request->all();
        $data['image'] = Portfolio3::updateImage($request, $portfolio3);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($portfolio3->update($data)) {
            return redirect()->route('portfolio3.index')->with('message', "Portfolio changed successfully");
        }
        return redirect()->route('portfolio3.index')->with('message', "Unable to update Portfolio");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Portfolio3::find($id)) {
            return redirect()->route('portfolio3.index')->with('message', "Portfolio not found");
        }

        $portfolio3 = Portfolio3::find($id);

        if (File::exists(public_path() . $portfolio3->image)) {
            File::delete(public_path() . $portfolio3->image);
        }

        if ($portfolio3->delete()) {
            return redirect()->route('portfolio3.index')->with('message', "Portfolio deleted successfully");
        }
        return redirect()->route('portfolio3.index')->with('message', "unable to delete Portfolio");
    }
}
