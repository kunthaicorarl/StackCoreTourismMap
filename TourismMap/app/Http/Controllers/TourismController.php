<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GalleryType;
use App\Province;
use App\TourismPlace;
use App\Helper;
use App\Tourism;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
class TourismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() {
       $this->middleware('auth');
    }
    public function index()
    {       
        $tourismPlace=TourismPlace::orderBy('id', 'desc')->paginate(50);
        return view('tourisms.index')->with('displayTourisms',$tourismPlace);

    }
   
    public function search($q)
    {  
       $tourism=null;
       if($q){
       $search=$q;
       $tourism=TourismPlace::where('title_khmer','like','%'.$search.'%')
       ->orWhere('title_english','like','%'.$search.'%')
       ->orderBy('title_khmer')
       ->paginate(50);
       }else{
        $tourism=TourismPlace::orderBy('id', 'desc')->paginate(3);
       }
     return view('tourisms.search')->with('displayTourisms',$tourism);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $galleryTypes=GalleryType::all();
        $provinces=Province::all();
        return \View::make('tourisms.create',array('galleryTypes'=>$galleryTypes,'provinces'=>$provinces));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function uploadSubmit(UploadRequest $request)
     {
         $product = Product::create($request->asll());
         foreach ($request->photos as $photo) {
             $filename = $photo->store('photos');
             ProductsPhoto::create([
                 'product_id' => $product->id,
                 'filename' => $filename
             ]);
         }
         return 'Upload successful!';
     }


    public function store(Request $request)
    {
        $url="img/gallerys/"; 
        $images=array();
      //  dd($request->picupload);
        if($files=$request->picupload){
            foreach($files as $file){
                $photoName = Helper::NewGuid().time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path($url), $photoName); 
                $images[]=$photoName;
            }
            dd($images);
        }

            $photos = count($request->picupload);
            $photoName=null;
            $url="img/gallerys/"; 
            $collection=null;
            $arrayItem =array();

        
        foreach(range(0, $photos) as $index) {
           
            $photoName=$request->picupload[$index];
            $photoName = Helper::NewGuid().time().'.'.$request->picupload[$index]->getClientOriginalExtension();
            $request->picupload[$index]->move(public_path($url), $photoName); 
            $collection = collect([$photoName]);
            $collection->pop();
            $arrayItem=array_add($items, $key, $value);
            
        }
      
        dd($collection);


    $validator = Validator::make($request->all(), [
             'gallery_type'=>'required',
             'province'=>'required',
             'title_khmer' => 'required',
             'title_english' => 'required',
             'latitude' => 'required|min:1|max:50',
             'longitude' => 'required|min:1|max:50',
             'picupload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
    if ($validator->passes()) {
         $photoName=null; 
         $photoNames = array(); 
         $url="img/gallerys/"; 
         $userId=Auth::user()->id;



            if($request->thumbnail->isValid()) {
                $photoName = Helper::NewGuid().time().'.'.$request->thumbnail->getClientOriginalExtension();
                $request->thumbnail->move(public_path($url), $photoName);  
            }
            $province=Province::find($request->province);
            if(!$province){
                return response()->json(['success'=>true,'infor'=>['Province not Found,[Error]']]);
            }
            $galleryType=GalleryType::find($request->gallery_type);
            if(!$galleryType){
                return response()->json(['success'=>true,'infor'=>['Gallery Type not Found,[Error]']]);
            }
           $user=Auth::user();
           $tourism =new TourismPlace;
           $tourism->latitude=$request->latitude;
           $tourism->longitude=$request->longitude;
           $tourism->users()->associate($user);
           $tourism->provinces()->associate($province);
           $tourism->title_khmer=$request->title_khmer;
           $tourism->title_english=$request->title_english;
           $tourism->thumbnail=$photoName;
           $tourism->video=$request->video;
           $tourism->description_khmer=$request->description_khmer;
           $tourism->description_english=$request->description_english;
           $tourism->address_khmer=$request->address_khmer;
           $tourism->address_english=$request->address_english;
           $tourism->status='1';
           $tourism->save();
           $tourism->galleryTypes()->save($galleryType);
           return response()->json(['success'=>true,'infor'=>['Tourism Successfully Saved']]);
      }
           return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]);
   
        

    //     $validator = Validator::make($request->all(), [
    //          'gallery_type'=>'required',
    //          'province'=>'required',
    //          'title_khmer' => 'required',
    //          'title_english' => 'required',
    //          'latitude' => 'required|min:1|max:50',
    //          'longitude' => 'required|min:1|max:50',
    //          'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //   ]);
    // if ($validator->passes()) {
    //      $photoName=null;  
    //      $url="img/gallerys/"; 
    //      $userId=Auth::user()->id;
    //         if($request->thumbnail->isValid()) {
    //             $photoName = Helper::NewGuid().time().'.'.$request->thumbnail->getClientOriginalExtension();
    //             $request->thumbnail->move(public_path($url), $photoName);  
    //         }
    //         $province=Province::find($request->province);
    //         if(!$province){
    //             return response()->json(['success'=>true,'infor'=>['Province not Found,[Error]']]);
    //         }
    //         $galleryType=GalleryType::find($request->gallery_type);
    //         if(!$galleryType){
    //             return response()->json(['success'=>true,'infor'=>['Gallery Type not Found,[Error]']]);
    //         }
    //        $user=Auth::user();
    //        $tourism =new TourismPlace;
    //        $tourism->latitude=$request->latitude;
    //        $tourism->longitude=$request->longitude;
    //        $tourism->users()->associate($user);
    //        $tourism->provinces()->associate($province);
    //        $tourism->title_khmer=$request->title_khmer;
    //        $tourism->title_english=$request->title_english;
    //        $tourism->thumbnail=$photoName;
    //        $tourism->video=$request->video;
    //        $tourism->description_khmer=$request->description_khmer;
    //        $tourism->description_english=$request->description_english;
    //        $tourism->address_khmer=$request->address_khmer;
    //        $tourism->address_english=$request->address_english;
    //        $tourism->status='1';
    //        $tourism->save();
    //        $tourism->galleryTypes()->save($galleryType);
    //        return response()->json(['success'=>true,'infor'=>['Tourism Successfully Saved']]);
    //   }
    //        return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tourism = TourismPlace::find($id);
        return \View::make('tourisms.remove',
         array('tourism'=>$tourism));
    }
    public function detail($id)
    {
        $tourism = TourismPlace::find($id);
        return \View::make('tourisms.detail',
         array('tourism'=>$tourism));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tourism = TourismPlace::find($id);
        $provinces = Province::all();
        $galleryType =GalleryType::all();
        return \View::make('tourisms.edit',
         array('tourism'=>$tourism,
            'provines'=>$provinces,
            'galleryTypes'=>$galleryType
             ));
          //  ->with('tourism', $tourisms);  
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
       // return response()->json(['success'=>false,'infor'=>$request->all()]);
        $validator = Validator::make($request->all(), [
            'gallery_type'=>'required',
            'provinces'=>'required',
            'title_khmer' => 'required',
            'title_english' => 'required',
            'latitude' => 'required|min:1|max:50',
            'longitude' => 'required|min:1|max:50',
           // 'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   if ($validator->passes()) {
       $photoName=null;  
       $url="img/gallerys/"; 
       $userId=Auth::user()->id;         
       $isExistImage=TourismPlace::find($request->_id);          
        if($request->_thumbnail && $isExistImage->thumbnail==$request->_thumbnail){
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
        
           $province=Province::find($request->provinces);
           if(!$province){
               return response()->json(['success'=>false,'infor'=>['Province not Found,[Error]']]);
           }
           $galleryType=GalleryType::find($request->gallery_type);
           if(!$galleryType){
               return response()->json(['success'=>false,'infor'=>['Gallery Type not Found,[Error]']]);
           }
         
         $user=Auth::user();
          $tourism =TourismPlace::find($request->_id);
          $tourism->latitude=$request->latitude;
          $tourism->longitude=$request->longitude;
          $tourism->users()->associate($user);
          $tourism->provinces()->associate($province);
          $tourism->title_khmer=$request->title_khmer;
          $tourism->title_english=$request->title_english;
          $tourism->thumbnail=$photoName;
          $tourism->video=$request->video;
          $tourism->description_khmer=$request->description_khmer;
          $tourism->description_english=$request->description_english;
          $tourism->address_khmer=$request->address_khmer;
          $tourism->address_english=$request->address_english;
          $tourism->status=$request->status=='Enable'?'1':'0';
          $tourism->galleryTypes()->detach();
          $tourism->galleryTypes()->save($galleryType);//->save($galleryType);//()->save($galleryType);
          //dd($tourism);
           $tourism->save();
         //
        
          return response()->json(['success'=>true,'infor'=>['Tourism Successfully Saved']]);
     }
          return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  destroy(Request $request)
    {  
      //  return response()->json(['success'=>false,'infor'=>$request->all()]);
        $validator = Validator::make($request->all(), [
            '_id'=>'required',
        ]);
        if ($validator->passes()) {
            $tourism=TourismPlace::find($request->_id);
            if($tourism){
                $tourism->delete();
                return response()->json(['success'=>true,'infor'=>['Tourism Successfully Deleted']]);
            }
            return response()->json(['success'=>false,'infor'=>['Tourism Not Found']]);
        }
        return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]);
    }

  
    public function enable(Request $request)
    {
        $tourism =TourismPlace::find($request->id);
        if(!$tourism){
            return response()->json(['success'=>false,'infor'=>['Tourism not Found,[Error]']]);
        }
        if($tourism->status==1){
            return response()->json(['success'=>false,'infor'=>['Tourism Place is already Enable']]);
        }
        $tourism->status=1;
        $tourism->save();
        return response()->json(['success'=>true,'infor'=>['Tourism Place Successfully Enable.']]);
    }
    public function disable(Request $request)
    {
        $tourism =TourismPlace::find($request->id);
        if(!$tourism){
            return response()->json(['success'=>false,'infor'=>['Tourism not Found,[Error]']]);
        }
        if($tourism->status==0){
            return response()->json(['success'=>false,'infor'=>['Tourism Place is already Disable']]);
        }
        $tourism->status=0;
        $tourism->save();
        return response()->json(['success'=>true,'infor'=>['Tourism Place Successfully Enable.']]);
    }
}
