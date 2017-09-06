<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GalleryType;
use App\Province;
use App\Helper;
use App\Tourism;
use App\User;
use Illuminate\Support\Facades\Validator;
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
          return view('tourisms.index');
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
     //   dd(array('galleryTypes'=>$galleryTypes,'provinces'=>$provinces));
        return \View::make('tourisms.create',array('galleryTypes'=>$galleryTypes,'provinces'=>$provinces));
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
             'gallery_type'=>'required',
             'province'=>'required',
             'title_khmer' => 'required',
             'title_english' => 'required',
             'latitude' => 'required|numeric', 
             'longitude' => 'required|numeric', 
            'description_khmer' => 'required',
            'description_english' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
      if ($validator->passes()) {
         $photoName=null;  
         $url="img/gallerys/"; 
         $userId=Auth::user()->id;
        if($request->thumbnail->isValid()) {
            $photoName = Helper::NewGuid().time().'.'.$request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path($url), $photoName);  
        }
        $province=Province::find($request->province->id);
        if(!$province){
            return response()->json(['success'=>true,'infor'=>['Province not Found']]);
        }
        $galleryType=GalleryType::find($request->gallery_type->id);
        if(!$galleryType){
            return response()->json(['success'=>true,'infor'=>['Gallery Type not Found']]);
        }
       
           $user=new User;
           $user=Auth::user();
           $tourism =new TourismPlace;
           $tourism->latitude=$request->latitude;
           $tourism->latitude=$request->latitude;
           $tourism->title_khmer=$request->title_khmer;
           $tourism->title_english=$request->title_english;
           $tourism->thumbnail=$photoName;
           $tourism->description_khmer=$request->description_khmer;
           $tourism->description_english=$request->description_english;
           $tourism->status=$request->status=='Enable'?true:false;
           $tourism->users()->associate($user);
           $tourism=$tourism->save();
           $tourism->accociate($province);
           $tourism->galleryTypes()->save($galleryType);
           return response()->json(['success'=>true,'infor'=>[$tourism]]);
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
    }
}
