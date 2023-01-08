<?php

namespace App\Http\Controllers;

use App\Page;
use Session;
use Image;

use Illuminate\Http\Request;

class PageController extends Controller
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
   

       $datas = Page::orderBy('id', 'desc')->get();
        return view('backend/page/list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		        return view('backend/page/create');

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
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2024',
        ]);
		
        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension(); 
                    
        $destinationPath = public_path('/normal_images');
        $photo->move($destinationPath, $imagename);
		
        $item = new Page();
        $type= Session::get('pageType');
        $url = preg_replace('!\s+!', '-', strtolower($request->title));
        $item->type = $type;
		$item->title = $request->title;
		$item->url = $url;
		$item->location = $request->location;
		$item->size = $request->size;
		$item->price = $request->price;
		$item->date = $request->date;
		$item->content = $request->content;
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
		$datas = \App\Page::orderBy('id', 'desc')->get();
		return view('backend/page/', compact('datas'));
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
        $item= \App\Page::find($id);
		return view('backend/page/create', compact('item'));
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

        $type= Session::get('pageType');
        $url = preg_replace('!\s+!', '-', strtolower($request->title));
        $item->type = $type;
		$item->title = $request->title;
		$item->url = $url;
        $item->location = $request->location;
		$item->size = $request->size;
		$item->price = $request->price;
		$item->date = $request->date;
		$item->content = $request->content;
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

        $item = \App\Page::find($id);
        $normal_images = public_path('/normal_images');
        if(file_exists($normal_images.'/'.$item->image)){
                unlink($normal_images.'/'.$item->image); 
        }
        $item->delete();
		return redirect()->back()->with('success', 'Item deleted successfully');

    }


    public function pageType($type){
       // return $type;

        Session::put('pageType', $type);
        $datas = Page::where('type', $type)->orderBy('id', 'desc')->get();
        return view('backend/page/list', compact('datas'));

    }


    
}
