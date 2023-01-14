<?php

namespace App\Http\Controllers;

use App\ProductGallery;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $datas = ProductGallery::where('product_id', $request->id)->orderBy('id', 'desc')->with('product')->get();
        return view('backend/product-gallery/list', compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend/product-gallery/create');

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
            'photo' => 'required',
        ]);

    
		
        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension(); 
                    
        $destinationPath = public_path('/normal_images');
        $photo->move($destinationPath, $imagename);

        $item = new ProductGallery();
		$item->product_id = $request->product_id;
		$item->image = $imagename;
		$item->save();
        return redirect()->back()->with('success', 'New image create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductGallery  $ProductGallery
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGallery $ProductGallery)
    {
        //
        $datas = ProductGallery::orderBy('id', 'desc')->get();
		return view('backend/product-gallery/', compact('datas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductGallery  $ProductGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductGallery $ProductGallery)
    {
        //
        $item= ProductGallery::find($id);
		return view('backend/product-gallery/create', compact('item'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductGallery  $ProductGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductGallery $ProductGallery)
    {
        //

        $item = ProductGallery::find($id);

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

		$item->product_id = $request->product_id;
		$item->image = $imagename ? $imagename : $item->image;
        $item->save();

		 return redirect()->back()->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductGallery  $ProductGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $item = ProductGallery::find($id);
        $normal_images = public_path('/normal_images');
        if(file_exists($normal_images.'/'.$item->image)){
                unlink($normal_images.'/'.$item->image); 
        }
        $item->delete();
		return redirect()->back()->with('success', 'Item deleted successfully');
    }
}
