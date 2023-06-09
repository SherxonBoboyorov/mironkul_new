<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolioImage1;
use App\Http\Requests\Admin\UpdatePortfolioImage1;
use App\Models\Portfolio1;
use App\Models\PortfolioImage1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioImage1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolioimage1s = PortfolioImage1::orderBy('id')->paginate(12);
        return view('admin.portfolioimage1.index', [
            'portfolioimage1s' => $portfolioimage1s
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolio1s = Portfolio1::all();
        return view('admin.portfolioimage1.create', [
            'portfolio1s' => $portfolio1s
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolioImage1 $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolioImage1 $request)
    {
        $data = $request->all();
        $data['image'] = PortfolioImage1::uploadImage($request);

        if (PortfolioImage1::create($data)) {
            return redirect()->route('portfolioimage1.index')->with('message', "Portfolio Image created seccessfully");
        }
        return redirect()->route('portfolioimage1.index')->with('message', "unable to created Portfolio Image");
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
    public function edit(PortfolioImage1 $portfolioimage1)
    {
        $portfolio1 = Portfolio1::all();
        return view('admin.portfolioimage1.edit', [
            'portfolio1' => $portfolio1,
            'portfolioimage1' => $portfolioimage1
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfolioImage1  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioImage1 $request, $id)
    {
        if (!PortfolioImage1::find($id)) {
            return redirect()->route('portfolioimage1.index')->with('message', "Portfolio Image not fount");
        }

        $portfolioimage1 = PortfolioImage1::find($id);

        $data = $request->all();
        $data['image'] = PortfolioImage1::updateImage($request, $portfolioimage1);

        if ($portfolioimage1->update($data)) {
            return redirect()->route('portfolioimage1.index')->with('message', "Portfolio Image changed successfully");
        }
        return redirect()->route('portfolioimage1.index')->with('message', "Unable to update Portfolio Image");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!PortfolioImage1::find($id)) {
            return redirect()->route('portfolioimage1.index')->with('message', "Portfolio Image not found");
        }

        $portfolioimage1 = PortfolioImage1::find($id);

        if (File::exists(public_path() . $portfolioimage1->image)) {
            File::delete(public_path() . $portfolioimage1->image);
        }

        if ($portfolioimage1->delete()) {
            return redirect()->route('portfolioimage1.index')->with('message', "Portfolio Image deleted successfully");
        }
        return redirect()->route('portfolioimage1.index')->with('message', "unable to delete Portfolio Image ");
    }
}
