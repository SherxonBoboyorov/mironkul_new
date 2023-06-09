<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolio;
use App\Http\Requests\Admin\UpdatePortfolio;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('id')->paginate(12);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolio  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolio $request)
    {
        $data = $request->all();
        $data['image'] = Portfolio::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Portfolio::create($data)) {
            return redirect()->route('portfolio.index')->with('message', "Portfolio created seccessfully");
        }
        return redirect()->route('portfolio.index')->with('message', "unable to created Portfolio");
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
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfolio  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolio $request, $id)
    {
        if (!Portfolio::find($id)) {
            return redirect()->route('portfolio.index')->with('message', "Portfolio not fount");
        }

        $portfolio = Portfolio::find($id);

        $data = $request->all();
        $data['image'] = Portfolio::updateImage($request, $portfolio);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($portfolio->update($data)) {
            return redirect()->route('portfolio.index')->with('message', "Portfolio changed successfully");
        }
        return redirect()->route('portfolio.index')->with('message', "Unable to update Portfolio");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Portfolio::find($id)) {
            return redirect()->route('portfolio.index')->with('message', "Portfolio not found");
        }

        $portfolio = Portfolio::find($id);

        if (File::exists(public_path() . $portfolio->image)) {
            File::delete(public_path() . $portfolio->image);
        }

        if ($portfolio->delete()) {
            return redirect()->route('portfolio.index')->with('message', "Portfolio deleted successfully");
        }
        return redirect()->route('portfolio.index')->with('message', "unable to delete Portfolio");
    }
}
