<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Province;
use App\User;
use App\Image;
use App\GalleryType;
use Auth;
use Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;
use View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class GalleryController extends Controller
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
           $gallery=GalleryType::orderBy('id', 'desc')->paginate(50);
           return view('gallerys.index')->with('displayGallerys',$gallery);
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
        return view('gallerys.create');
     }
     public function detail($id)
     {  
          $galleryType = GalleryType::find($id);
          $image=Image::all()->where('gallery_type_id','=',$id);
         return \View::make('gallerys.detail',array(
            'galleryType'=>$galleryType,
            'displayImage'=>$image
         ));
       //  return response()->json(['success'=>false,'infor'=>[$galleryType]]); 
     }


     public function addimage($id)
     {  
        $galleryType = GalleryType::find($id);
          $image=Image::find($id);
         return \View::make('gallerys.addimage',array(
            'image'=>$image,
           'gallery_type_id'=>$galleryType));
           
       
     }
     public function updateimage($id)
     {  
      //  
        $image=Image::find($id);
        $galleryType = GalleryType::find($image->gallery_type_id);
        return \View::make('gallerys.updateimage',array(
          'image'=>$image,
         'gallery_type_id'=>$galleryType));
        //   return response()->json(['success'=>true,'infor'=>[$image]]);
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
      
       // return response()->json(['success'=>false,'infor'=>$request->all()]); 
             $validator = Validator::make($request->all(), [
             'title' => 'required|bail|unique:gallery_types',
             ]);
            if ($validator->passes()) {
                $galleryType=new GalleryType;
                $galleryType->title=$request->title;
                $galleryType->description=$request->description;
                $galleryType->users()->associate(Auth::user());
                $galleryType->save();
                 return response()->json(['success'=>true,'infor'=>['Gallery Type Successful Saved']]);
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
         $galleryType = GalleryType::find($id);
         return \View::make('gallerys.remove')
             ->with('gallerys', $galleryType);
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
     public function updateFromGallery(Request $request)
     {      
          $validator = Validator::make($request->all(), [
            '_id' => 'required', 
            'gallery_type_id'=>'required',
            ]);
        
            if ($validator->passes()) {
                $photoName=null;   
                $userId=Auth::user();
                $isExistImage=Image::find($request->_id); 
                if(!$isExistImage)   return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]); 
                if($request->_thumbnail && $isExistImage->name==$request->_thumbnail){
                    $photoName=$request->_thumbnail;
                }else{
                    $validator = Validator::make($request->only('thumbnail'), [
                        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    ]);
                    if ($validator->passes()) {
                        if($request->thumbnail->isValid()) {
                            $photoName = Helper::NewGuid().time().'.'.$request->thumbnail->getClientOriginalExtension();
                            $request->thumbnail->move(public_path($url), $photoName);  
                          }else {
                                  return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]); 
                          }
                  }else {                           
                           return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]);                            
                  }
                }
                 
                $galleryType=GalleryType::find($request->gallery_type_id);
                if(!$galleryType) return response()->json(['success'=>false,'infor'=>['Gallery Type Object not found']]);                            
                $image =Image::find($request->_id); 
                if(!$image) return response()->json(['success'=>false,'infor'=>['Image Object not found']]);                          
                $image->title=$request->title;
                $image->name=$photoName;
                $image->url=$request->url;
                $image->description=$request->description;
                $image->caption=$request->caption;
                $image->alt_text=$request->alt_text;
                $image->galleryTypes()->associate($galleryType);
                $image->save();
                return response()->json(['success'=>true,'infor'=>['Image save Successfully']]);
            }
 
          
           return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]); 
          
    }
    public function removeImage(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required'
       ]);
         
         if ($validator->passes()) {
                   $image =Image::find($request->id);;
                   $image->delete();
                  return response()->json(['success'=>true,'infor'=>['Image Successful Removed']]);
        }
      return response()->json(['success'=>false,'infor'=>$request->all()]); 

    }
}
