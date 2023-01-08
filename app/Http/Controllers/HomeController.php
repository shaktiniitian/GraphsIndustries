<?php
use Illuminate\Support\Facades\DB;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function editContact($id)
    {
       
        $item = \App\Page::where('id',$id)->first();
        $other = json_decode($item->datas);
        return view('backend/page/contact-us', compact('item','other'));
    }
    
        public function contactList()
    {
        $items = \App\Page::where('type',2)->get();
        return view('backend/page/contacts', compact('items'));
    }
    
    
    public function saveEnquiry(Request $request){
        
            $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'subject' => 'required',

        ]);



        $item = new Lead();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->phone = $request->phone;
        $item->subject = $request->subject;
        $item->type = 'contact';
        $item->message = $request->message;
        $item->save();
        return redirect()->back()->with('success', 'Your data has been sent successfully');

    }

    public function contactUsStore(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'map' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $item = \App\Page::find($id);

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
        $array= array('sub_title'=>$request->sub_title, 'address'=>$request->address, 'phone'=>$request->phone, 'email'=>$request->email, 'touch_time'=>$request->touch_time, 'call_time'=>$request->call_time, 'mail_time'=>$request->mail_time);
        $array_json =json_encode($array,JSON_PRETTY_PRINT);
        $item->title = $request->title;
        $item->datas = $array_json;
        $item->content = $request->map;
        $item->image = $imagename ? $imagename : $item->image;
        $item->save();
        
        return redirect()->back()->with('success', 'Item updated successfully');
    }


    public function lead(){
        $datas = \App\Lead::orderBy('id','DESC')->get();
        return view('backend/page/lead', compact(['datas']));

    }


    public function projectCategory(){
        
        $datas = DB::table('project_category')->where('status', 1)->orderBy('id','DESC')->get(); 
        return view('backend/project/list', compact('datas'));

    }


    public function addprojectCategory()
    {
        return view('backend/project/create');

    }


    public function addProjectCateg(Request $request)
    {                        
                
        $title = $request->input('title');        
        $url = preg_replace('!\s+!', '-', strtolower($title));
        DB::table('project_category')->insert(
            ['title' =>$title, 'slug' => $url]
        );    
        
        return redirect()->back()->with('success', 'Item create successfully');
    }


    public function deleteProjectCateg(Request $request)
    {                        
        $id = $request->input('categ_id'); 
        $status = 0;
                                
        DB::update('update project_category set `status`= ? where id = ?',[$status,$id]);         
                              
        return redirect()->back()->with('success', 'Item deleted successfully');
    }
    
}
