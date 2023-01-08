<?php

namespace App\Http\Controllers;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         //
         $datas = Video::orderBy('id', 'desc')->get();
         return view('backend/videos/list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend/videos/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'url' => 'required',
        ]);
        $item = new Video();
        $item->title = $request->title;
        $item->url = $request->url;
        $item->description = $request->description;
        $item->save();

        return redirect()->back()->with('success', 'Item updated successfully');
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
        //
        $item = Video::find($id);
        return view('backend/videos/create', compact('item'));

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
        //
        $this->validate($request, [
            'url' => 'required',
        ]);
        $item = Video::find($id);
        $item->title = $request->title;
        $item->url = $request->url;
        $item->description = $request->description;
        $item->save();

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Video::find($id)->delete();
         return redirect()->back()->with('success', 'Item deleted successfully');
    }
}
