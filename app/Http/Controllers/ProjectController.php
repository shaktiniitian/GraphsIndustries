<?php

namespace App\Http\Controllers;

use App\Project;
use App\Page;
use Session;
use Image;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Page::whereIn('type',['11','12','13'])->orderBy('id', 'desc')->get();
        return view('backend/project/list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

		        return view('backend/project/create');

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
        $item->type = $request->type;
		$item->content = $request->content;
		$item->datas = $request->short_description;
		$item->url = trim($url);
		$item->image = $imagename;
		$item->status = $request->status ? 1 :0;

		$item->save();
		  // redirect
        return redirect()->back()->with('success', 'New Item create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $item= \App\Page::find($id);
		return view('backend/project/create', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $item = Page::find($id);

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
        $item->type = $request->type;
        $item->url = trim($url);
		$item->content = $request->content;
		$item->datas = $request->short_description;
		$item->image = $imagename ? $imagename : $item->image;
		$item->status = $request->status ? 1 :0;
        $item->save();

		 return redirect()->back()->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $Page
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
