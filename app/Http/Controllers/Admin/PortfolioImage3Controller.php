<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolioImage3;
use App\Http\Requests\Admin\UpdatePortfolioImage3;
use App\Models\Portfolio3;
use App\Models\PortfolioImage3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioImage3Controller extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolioimage3s = PortfolioImage3::orderBy('id')->paginate(12);
        return view('admin.portfolioimage3.index', [
            'portfolioimage3s' => $portfolioimage3s
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolio3s = Portfolio3::all();
        return view('admin.portfolioimage3.create', [
            'portfolio3s' => $portfolio3s
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolioImage3 $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolioImage3 $request)
    {
        $data = $request->all();
        $data['image'] = PortfolioImage3::uploadImage($request);

        if (PortfolioImage3::create($data)) {
            return redirect()->route('portfolioimage3.index')->with('message', "Portfolio Image created seccessfully");
        }
        return redirect()->route('portfolioimage3.index')->with('message', "unable to created Portfolio Image");
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
    public function edit(PortfolioImage3 $portfolioimage3)
    {
        $portfolio3 = Portfolio3::all();
        return view('admin.portfolioimage3.edit', [
            'portfolio3' => $portfolio3,
            'portfolioimage3' => $portfolioimage3
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfolioImage3  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioImage3 $request, $id)
    {
        if (!PortfolioImage3::find($id)) {
            return redirect()->route('portfolioimage3.index')->with('message', "Portfolio Image not fount");
        }

        $portfolioimage3 = PortfolioImage3::find($id);

        $data = $request->all();
        $data['image'] = PortfolioImage3::updateImage($request, $portfolioimage3);

        if ($portfolioimage3->update($data)) {
            return redirect()->route('portfolioimage3.index')->with('message', "Portfolio Image changed successfully");
        }
        return redirect()->route('portfolioimage3.index')->with('message', "Unable to update Portfolio Image");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!PortfolioImage3::find($id)) {
            return redirect()->route('portfolioimage3.index')->with('message', "Portfolio Image not found");
        }

        $portfolioimage3 = PortfolioImage3::find($id);

        if (File::exists(public_path() . $portfolioimage3->image)) {
            File::delete(public_path() . $portfolioimage3->image);
        }

        if ($portfolioimage3->delete()) {
            return redirect()->route('portfolioimage3.index')->with('message', "Portfolio Image deleted successfully");
        }
        return redirect()->route('portfolioimage3.index')->with('message', "unable to delete Portfolio Image ");
    }
}
