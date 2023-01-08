<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Category;
use Session;
use Image;

use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $datas = Gallery::orderBy('id', 'desc')->where('type','file')->get();
        return view('backend/files/list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

		return view('backend/files/create');

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
            'photo' => 'required',
        ]);
		
        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension(); 
                    
        $destinationPath = public_path('/normal_images');
        $photo->move($destinationPath, $imagename);
		
        $item = new Gallery();
        $item->type = 'file';
        $item->title = 'file';
        $item->image = $imagename;
        $item->status = $request->status ? 1 :0;
		$item->save();
		  // redirect
        return redirect()->back()->with('success', 'New Item create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $file
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        return 200;
		$datas = \App\Gallery::orderBy('id', 'desc')->get();
		return view('backend/files/', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $item= \App\Gallery::find($id);
		return view('backend/files/create', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $item = \App\Gallery::find($id);

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

        $item->type = 'file';
        $item->title = 'file';
		$item->image = $imagename ? $imagename : $item->image;
        $item->status = $request->status ? 1 :0;
        $item->save();

		 return redirect()->back()->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $item = \App\Gallery::find($id);
        $normal_images = public_path('/normal_images');
        if(file_exists($normal_images.'/'.$item->image)){
                unlink($normal_images.'/'.$item->image); 
        }
        $item->delete();
		return redirect()->back()->with('success', 'Item deleted successfully');

    }


   
}
