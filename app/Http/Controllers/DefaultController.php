<?php

namespace App\Http\Controllers;
use App\Page;
use App\Lead;
use App\Category;
use App\Content;
use App\HomeSlider;
use App\Product;
use Illuminate\Http\Request;
use Session;

class DefaultController extends Controller
{
    //

    public function home(){

            $sliders = HomeSlider::where('status','1')->get();
            $products = Product::where('status','1')->get();
        
        return view('frontend/home', compact('sliders','products'));


    }
    
    public function pageDetail($url){
        
        $item = '';
        
        switch($url){
            
            case "news":
             $item = Page::where('type', 10)->where('status',1)->get();
             $template = "news";
            break;
          case "gallery":
             $item = Category::where('status',1)->get();
             $template = "gallery";
            break;
       case "contact":
             $item = Page::where('type', 2)->get();
             $template = "contact";
            break;
       case "login":
             $item = [];
             return view('auth.login');
            break;
       default;
              $item = Page::with('gallery')->where('url', $url)->first();
              $template = "project";
        }
        
        //return $item;
        
            return view('frontend/'.$template)->with('item',$item);

        
        
    }
    


    public function contactLead(Request $request){


        $item = new Lead();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->phone = $request->phone;
        $item->subject = $request->subject;
        $item->type = 'contact';
        $item->message = $request->message;
        $item->save();
        return response()->json(['success' => "inserted"], 200);

    }
    
public function saveLead(Request $request){
       $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'product' => 'required',
        ]);
        $item = new Lead();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->mobile = $request->mobile;
        $item->product = $request->product;
        $item->save();
        return redirect()->back()->with('success', 'Your detail has been sent successfully');

    }


    public function productDetail(Request $request){

        $item = Product::find($request->id);

        return view('frontend/product-detail', compact('item'));

    }
    
}
