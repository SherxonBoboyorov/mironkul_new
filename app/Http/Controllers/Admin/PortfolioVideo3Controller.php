<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolioVideo3;
use App\Http\Requests\Admin\UpdatePortfolioVideo3;
use App\Models\Portfolio3;
use App\Models\PortfolioVideo3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioVideo3Controller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfoliovideo3s = PortfolioVideo3::orderBy('id')->paginate(10);
        return view('admin.portfoliovideo3.index', [
            'portfoliovideo3s' => $portfoliovideo3s
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
        return view('admin.portfoliovideo3.create', [
            'portfolio3s' => $portfolio3s
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolioVideo3 $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolioVideo3 $request)
    {
        $data = $request->all();
        $data['image'] = PortfolioVideo3::uploadImage($request);
        $data['video'] = PortfolioVideo3::uploadVideo($request);

        if (PortfolioVideo3::create($data)) {
            return redirect()->route('portfoliovideo3.index')->with('message', "Portfolio Video created seccessfully");
        }
        return redirect()->route('portfoliovideo3.index')->with('message', "unable to created Portfolio Video");
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
    public function edit(PortfolioVideo3 $portfoliovideo3)
    {
        $portfolio3 = Portfolio3::all();
        return view('admin.portfoliovideo3.edit', [
            'portfolio3' => $portfolio3,
            'portfoliovideo3' => $portfoliovideo3
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfolioVideo3  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioVideo3 $request, $id)
    {
        if (!PortfolioVideo3::find($id)) {
            return redirect()->route('portfoliovideo3.index')->with('message', "Portfolio Video not fount");
        }

        $portfoliovideo3 = PortfolioVideo3::find($id);

        $data = $request->all();
        $data['image'] = PortfolioVideo3::updateImage($request, $portfoliovideo3);
        $data['video'] = PortfolioVideo3::updateVideo($request, $portfoliovideo3);

        if ($portfoliovideo3->update($data)) {
            return redirect()->route('portfoliovideo3.index')->with('message', "Portfolio Video changed successfully");
        }
        return redirect()->route('portfoliovideo3.index')->with('message', "Unable to update Portfolio Video");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfoliovideo3 = PortfolioVideo3::find($id);

        if (File::exists(public_path() . $portfoliovideo3->video)) {
            File::delete(public_path() . $portfoliovideo3->video);
        }

        if ($portfoliovideo3->delete()) {
            return redirect()->route('portfoliovideo3.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('portfoliovideo3.index')->with('message', "failed to delete successfully!!!");
    }
}
