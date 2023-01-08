<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Product::orderBy('id', 'desc')->get();
        return view('backend/products/list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend/products/create');
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
            'title' => 'required',
        ]);

        $photo = $request->file('photo');
        $imagename = time() . '.' . $photo->getClientOriginalExtension();

        $destinationPath = public_path('/normal_images/products');
        $photo->move($destinationPath, $imagename);

        $item = new Product();
        $item->title = $request->title;
        $item->file = $imagename;
        $item->description = $request->description;
        $item->save();
        // redirect
        return redirect()->back()->with('success', 'New Item create successfully');
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

        $item = Product::find($id);
        return view('backend/products/create', compact('item'));
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
            'title' => 'required',
        ]);
        $item = Product::find($id);

        $imagename = '';

        if (!empty($request->file('photo'))) {
            $normal_images = public_path('/normal_images/products');
            if (!empty($item->file) && file_exists($normal_images . '/' . $item->file)) {
                unlink($normal_images . '/' . $item->file);
            }
            $photo = $request->file('photo');
            $imagename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move($normal_images, $imagename);
        }

    //   /  return $imagename;

        $item->title = $request->title;
        $item->file = !empty($imagename) ? $imagename : $item->file;
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
        $item = Product::find($id);
        $normal_images = public_path('/normal_images/products');
        if(file_exists($normal_images.'/'.$item->file)){
                unlink($normal_images.'/'.$item->file); 
        }
        $item->delete();
		return redirect()->back()->with('success', 'Item deleted successfully');
    }
}
