<?php

namespace App\Http\Controllers;
use App\ProjectGallery;
use Image;

use Illuminate\Http\Request;

class ProjectGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $datas = ProjectGallery::orderBy('id', 'desc')->get();
        return view('backend/project-gallery/list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

		return view('backend/project-gallery/create');

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
            'project_id' => 'required',
            'photo' => 'required',
        ]);
		
        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension(); 
                    
        $destinationPath = public_path('/normal_images');
        $photo->move($destinationPath, $imagename);
		
        $item = new ProjectGallery();
		$item->project_id = $request->project_id;
		$item->image = $imagename;
		$item->save();
		  // redirect
        return redirect()->back()->with('success', 'New Item create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
		$datas = ProjectGallery::orderBy('id', 'desc')->get();
		return view('backend/project-gallery/', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $item= ProjectGallery::find($id);
		return view('backend/project-gallery/create', compact('item'));
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

        $item = ProjectGallery::find($id);

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

		$item->project_id = $request->project_id;
		$item->image = $imagename ? $imagename : $item->image;
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

        $item = ProjectGallery::find($id);
        $normal_images = public_path('/normal_images');
        if(file_exists($normal_images.'/'.$item->image)){
                unlink($normal_images.'/'.$item->image); 
        }
        $item->delete();
		return redirect()->back()->with('success', 'Item deleted successfully');

    }


   
}
