<?php

namespace App\Http\Controllers;

use App\Content;
use App\Page;
use Session;
use Image;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


         $datas = Page::whereIn('type',[1,4,8,14])->orderBy('id', 'desc')->get();
        return view('backend/content/list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('backend/content/create');

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
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2024',
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
        ]);

        $imagename = '';
		if(!empty($request->file('photo'))){
            $photo = $request->file('photo');
            $imagename = time().'.'.$photo->getClientOriginalExtension(); 
            $destinationPath = public_path('/normal_images');
            $photo->move($destinationPath, $imagename);

        }

		$url = str_replace([' ', '&', '  ', '?'], ['-','-','-',''], strtolower($request->title));

		$item = new Page();
		$item->title = $request->title;
		$item->url = $url;
        $item->type = $request->type;
        $item->datas = $request->other;
		$item->content = $request->content;
		$item->image = $imagename;
        $item->status = $request->status ? 1 :0;
		$item->save();
		  // redirect
        return redirect()->back()->with('success', 'Item create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
		$datas = Page::where('type','!=','contact')->orderBy('id', 'desc')->get();
		return view('backend/content/', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $item= Page::find($id);
		return view('backend/content/create', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2024',
            'title' => 'required',
            'type' => 'required',
        ]);

        $item = Page::find($id);
        $imagename = '';

        if(!empty($request->file('photo'))){
   
        $normal_images = public_path('/normal_images');
        if(!empty($item->image) && file_exists($normal_images.'/'.$item->image)){
                unlink($normal_images.'/'.$item->image); 
        }
        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension(); 
        $photo->move($normal_images, $imagename);

    }
     $url = str_replace([' ', '&', '  ', '?'], ['-','-','-',''], strtolower($request->title));

		$item->title = $request->title;
		$item->url = $url;
		$item->type = $request->type;
		$item->datas = $request->other;
		$item->content = $request->content;
		$item->image = $imagename ? $imagename : $item->image;
        $item->status = $request->status ? 1 :0;
        $item->save();



		 return redirect()->back()->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $item = Page::find($id);
        $normal_images = public_path('/normal_images');
        if(file_exists($normal_images.'/'.$item->image)){
                unlink($normal_images.'/'.$item->image); 
        }
        $item->delete();
		return redirect()->back()->with('success', 'Item deleted successfully');

    }


    
}
