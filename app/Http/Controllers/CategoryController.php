<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $datas = Category::where('type','gallery')->orderBy('id', 'desc')->get();
        return view('backend/category/list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

		return view('backend/category/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $this->validate($request, [
            'title' => 'required',
        ]);
		
        $item = new Category();
		$item->title = $request->title;
		$item->type = 'gallery';
		$item->status = $request->status ? 1 :0;
		$item->save();
		  // redirect
        return redirect()->back()->with('success', 'New Item create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
		$datas = Category::orderBy('id', 'desc')->get();
		return view('backend/category/', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $item= Category::find($id);
		return view('backend/category/create', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $item = \App\Category::find($id);


		$item->title = $request->title;
		$item->type = 'gallery';
		$item->status = $request->status ? 1 :0;
        $item->save();

		 return redirect()->back()->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $item = Category::find($id);

        $item->delete();
		return redirect()->back()->with('success', 'Item deleted successfully');

    }


   
}
