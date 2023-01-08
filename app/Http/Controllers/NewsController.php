<?php

namespace App\Http\Controllers;

use App\Page;
use Session;
use Image;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
 
        $datas = Page::where('type',10)->orderBy('id', 'desc')->get();
        return view('backend/news/list', compact('datas'));
    }

    /**
     * Show the form for creating a Itemresource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		        return view('backend/news/create');

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
            'content' => 'required',
        ]);
        
        $imagename = null;
       if(!empty($request->file('photo'))){
        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension(); 
        $destinationPath = public_path('/normal_images');
        $photo->move($destinationPath, $imagename);
       }
        
        $url = str_replace([' ', '&', '  ', '?'], ['-','-','-',''], strtolower($request->title));
		
		$item = new Page();
        $item->title = $request->title;
        $item->status = $request->status ? 1 :0;
        $item->content = $request->content;
        $item->type = 10;
        $item->url = trim($url);
		$item->image = $imagename;
		$item->save();
		  // redirect
        return redirect()->back()->with('success', 'Item create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page/  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
		$datas = \App\Page::orderBy('id', 'desc')->get();
		return view('backend/news/', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $item= \App\Page::find($id);
		return view('backend/news/create', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
		

        $item = \App\Page::find($id);


        $imagename= '';

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
        $item->status = $request->status ? 1 :0;
        $item->content = $request->content;
        $item->type = 10;
        $item->url = trim($url);
		$item->image = $imagename ? $imagename : $item->image;
        $item->save();



		 return redirect()->back()->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $item = \App\Page::find($id);
        $normal_images = public_path('/normal_images');
        if(file_exists($normal_images.'/'.$item->image)){
                unlink($normal_images.'/'.$item->image); 
        }
        $item->delete();
		return redirect()->back()->with('success', 'Item deleted successfully');

    }
}
