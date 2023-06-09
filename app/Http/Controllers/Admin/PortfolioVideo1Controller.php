<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePortfolioVideo1;
use App\Http\Requests\Admin\UpdatePortfolioVideo1;
use App\Models\Portfolio1;
use App\Models\PortfolioVideo1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioVideo1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfoliovideo1s = PortfolioVideo1::orderBy('id')->paginate(10);
        return view('admin.portfoliovideo1.index', [
            'portfoliovideo1s' => $portfoliovideo1s
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
        return view('admin.portfoliovideo1.create', [
            'portfolio1s' => $portfolio1s
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePortfolioVideo1 $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolioVideo1 $request)
    {
        $data = $request->all();
        $data['image'] = PortfolioVideo1::uploadImage($request);
        $data['video'] = PortfolioVideo1::uploadVideo($request);

        if (PortfolioVideo1::create($data)) {
            return redirect()->route('portfoliovideo1.index')->with('message', "Portfolio Video created seccessfully");
        }
        return redirect()->route('portfoliovideo1.index')->with('message', "unable to created Portfolio Video");
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
    public function edit(PortfolioVideo1 $portfoliovideo1)
    {
        $portfolio1 = Portfolio1::all();
        return view('admin.portfoliovideo1.edit', [
            'portfolio1' => $portfolio1,
            'portfoliovideo1' => $portfoliovideo1
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdatePortfolioVideo1  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioVideo1 $request, $id)
    {
        if (!PortfolioVideo1::find($id)) {
            return redirect()->route('portfoliovideo1.index')->with('message', "Portfolio Video not fount");
        }

        $portfoliovideo1 = PortfolioVideo1::find($id);

        $data = $request->all();
        $data['image'] = portfoliovideo1::updateImage($request, $portfoliovideo1);
        $data['video'] = PortfolioVideo1::updateVideo($request, $portfoliovideo1);

        if ($portfoliovideo1->update($data)) {
            return redirect()->route('portfoliovideo1.index')->with('message', "Portfolio Video changed successfully");
        }
        return redirect()->route('portfoliovideo1.index')->with('message', "Unable to update Portfolio Video");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfoliovideo1 = portfoliovideo1::find($id);

        if (File::exists(public_path() . $portfoliovideo1->video)) {
            File::delete(public_path() . $portfoliovideo1->video);
        }

        if ($portfoliovideo1->delete()) {
            return redirect()->route('portfoliovideo1.index')->with('message', "deleted successfully!!!");
        }

        return redirect()->route('portfoliovideo1.index')->with('message', "failed to delete successfully!!!");
    }
}
