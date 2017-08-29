<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Province;
use App\User;
use App\GalleryType;
use App\Image;
use Auth;
use Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;
use View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class ImageController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
        // $this->middleware(['auth', 'isAdmin']);//isAdmin middleware lets only users with a //specific permission permission to access these resources
         $this->middleware('auth');
     }
     public function index()
     {   
           $image=Image::orderBy('id', 'desc')->paginate(3);
           return view('images.index')->with('displayImages',$image);
     }
     public function search($q)
      {  
         $galleryType=null;
         if($q){
         $search=$q;
         $galleryType=GalleryType::where('title','like','%'.$search.'%')
         ->orderBy('title')
         ->paginate(50);
         }else{
          $galleryType=GalleryType::orderBy('id', 'desc')->paginate(3);
         }
       return view('gallerys.search')->with('displayGalleryTypes',$galleryType);
     }
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
        $galleryType=GalleryType::all();
        return view('images.create')->with('displayGalleryType',$galleryType);;
     }
     public function detail($id)
     {
          $galleryType = GalleryType::find($id);
         return \View::make('gallerys.detail')
             ->with('galleryType', $galleryType);
     }
 
 
        protected function validator(array $data)
     {
         return Validator::make($data, [
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:6|confirmed',
         ]);
     }
 
     /**
      * Create a new user instance after a valid registration.
      *
      * @param  array  $data
      * @return \App\User
      */
     protected function createModel(array $data)
     {
         return User::create([
             'name' => $data['name'],
             'email' => $data['email'],
             'password' => bcrypt($data['password']),
         ]);
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
 
     public function store(Request $request)
     {        
           
             $validator = Validator::make($request->all(), [
             'title' => 'required|bail|unique:gallery_types',
             ]);
            if ($validator->passes()) {
                $galleryType=new GalleryType;
                $galleryType->title=$request->title;
                $galleryType->description=$request->description;
                $galleryType->save();
                 return response()->json(['success'=>true,'infor'=>['Gallery Type Successful Saved'.$list]]);
            }
            return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]); 
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $province = GalleryType::find($id);
         return \View::make('gallerys.remove')
             ->with('province', $province);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {  
         $gallerType = GalleryType::find($id);
         return \View::make('gallerys.edit')
             ->with('gallerType',$gallerType);    
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request)
     {      
          $validator = Validator::make($request->all(), [
            '_id' => 'required',  
            'title' => 'required|bail|unique:gallery_types',
            ]);
           if ($validator->passes()) {
               $galleryType=GalleryType::find($request->_id);
               $galleryType->title=$request->title;
               $galleryType->description=$request->description;
               $galleryType->save();
                return response()->json(['success'=>true,'infor'=>['Gallery Type Successful Saved']]);
           }
           return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]); 

             
    }
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy(Request $request)
     {
          $validator = Validator::make($request->all(), [
                  '_id' => 'required'
             ]);
               
               if ($validator->passes()) {
                         $province =Province::find($request->_id);;
                         if(!$province){
                             return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]);
                         }
                         $province->delete();
                        return response()->json(['success'=>true,'infor'=>['Province Successful Removed']]);
              }
         //return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]); 
         return response()->json(['success'=>false,'infor'=>$request->all()]); 
     }
}
