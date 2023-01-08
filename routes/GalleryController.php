<?php

namespace App\Http\Controllers;

use App\Gallery;
use Session;
use Image;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       // return \App\User::with('comments', 'userreplies')->with('profile')->get();
       // 
       // Session::put('employee', 'Employee session started');

       Session::pull('pageTitle');
       Session::pull('page_id');
       Session::pull('galleryType');
       session()->forget('pageType');

       //return Session::get('pageType');



       $datas = Gallery::whereNull('page_id')->orderBy('id', 'desc')->get();
        return view('backend/gallery/list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
               // return Session::get('galleryType');

		        return view('backend/gallery/create');

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
        $page_id= Session::get('page_id');
        $item->page_id = $page_id;
		$item->title = $request->title;
		$item->type = Session::get('galleryType');
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
        Session::pull('pageTitle');
        Session::pull('page_id');
        Session::pull('galleryType');
        session()->forget('pageType');

		$datas = \App\Gallery::orderBy('id', 'desc')->get();
		return view('backend/gallery/', compact('datas'));
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
        $item= \App\Gallery::find($id);
		return view('backend/gallery/create', compact('item'));
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

        $page_id= Session::get('page_id');
        $item->page_id = $page_id;
        $item->title = $request->title;
        $item->type = Session::get('galleryType');
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

        $item = \App\Gallery::find($id);
        $normal_images = public_path('/normal_images');
        if(file_exists($normal_images.'/'.$item->image)){
                unlink($normal_images.'/'.$item->image); 
        }
        $item->delete();
		return redirect()->back()->with('success', 'Item deleted successfully');

    }


    public function pageGallery($page_id){
        session()->forget('galleryType');

        $page = \App\Page::find($page_id);
        Session::put('page_id', $page_id);
        Session::put('pageTitle', $page->title);

        $datas = Gallery::where('page_id', $page_id)->orderBy('id', 'desc')->get();
        return view('backend/gallery/list', compact('datas'));

    }
    public function brochureGallery($page_id){
        session()->forget('galleryType');
        $page = \App\Page::find($page_id);
        Session::put('page_id', $page_id);
        Session::put('pageTitle', $page->title);
        Session::put('galleryType', 'brochure');

        $datas = Gallery::where('page_id', $page_id)->where('type','!=','brochure')->orderBy('id', 'desc')->get();
        return view('backend/gallery/list', compact('datas'));

    }

    
    public function pageMapGallery($page_id){

        $page = \App\Page::find($page_id);
        Session::put('page_id', $page_id);
        Session::put('pageTitle', $page->title);
        Session::put('galleryType', 'map');
        $datas = Gallery::where('page_id', $page_id)->where('type','map')->orderBy('id', 'desc')->get();
        return view('backend/gallery/list', compact('datas'));

    }
}
