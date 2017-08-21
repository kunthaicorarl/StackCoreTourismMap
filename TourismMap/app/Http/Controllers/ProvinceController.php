<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Province;
use App\User;
use Auth;
use Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;
use View;
use App\Role;
class ProvinceController extends Controller
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
      //  $user=Role::find(2)->users;

        //  $user = User::find(2);
        //  $user->roles()->attach(3);

         //  $roles =User::find(1)->roles()->orderBy('name')->get();
         // return response()->json(['success'=>false,'infor'=>$roles]); 
          
        //  $user =User::find(1);
         
        //  $user->roles()->saveMany([
        //      new Role(['name' => 'A new comment.','display_name' => 'A new comment.']),
        //      new Role(['name' => 'A new comment2.','display_name' => 'A new comment2.']),
        //  ]);
        //  return response()->json(['success'=>false,'infor'=>$user]); 
         $province=Province::orderBy('id', 'desc')->paginate(3);
         return view('provinces.index')->with('displayProvinces',$province);
	}
    public function search($q)
     {  
        $province=null;
        if($q){
        $search=$q;
        $province=Province::where('title_khmer','like','%'.$search.'%')
        ->orWhere('title_english','like','%'.$search.'%')
        ->orderBy('title_khmer')
        ->paginate(50);
        }else{
         $province=Province::orderBy('id', 'desc')->paginate(3);
        }
      return view('provinces.search')->with('displayProvinces',$province);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('provinces.create');
    }
    public function detail($id)
    {
         $province = Province::find($id);
        return \View::make('provinces.detail')
            ->with('province', $province);
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
                 'title_khmer' => 'required',
                 'title_english' => 'required',
                  'description_khmer' => 'required',
                 'description_english' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
           if ($validator->passes()) {
              $photoName=null;   
             $userId=Auth::user()->id;
             if($request->thumbnail->isValid()) {
                $photoName = 'province_'.time().'.'.$request->thumbnail->getClientOriginalExtension();
                $request->thumbnail->move(public_path('img/provinces'), $photoName);  
             }
                $user=new User;
                $user=Auth::user();
                $province =new Province;
                $province->postal_code=$request->postal_code;
                $province->title_khmer=$request->title_khmer;
                $province->title_english=$request->title_english;
                $province->thumbnail=$photoName?$photoName:null;
                $province->description_khmer=$request->description_khmer;
                $province->description_english=$request->description_english;
                $province->status=$request->status=='Enable'?true:false;
                $province->users()->associate($user);
                $province->save();
      
                return response()->json(['success'=>true,'infor'=>['Province Successful Saved']]);
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
        $province = Province::find($id);
        return \View::make('provinces.remove')
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
           $province = Province::find($id);
        return \View::make('provinces.edit')
            ->with('province', $province);
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
                 '_id'=>'required',
                 'title_khmer' => 'required',
                 'title_english' => 'required',
                  'description_khmer' => 'required',
                 'description_english' => 'required',
            ]);

    

      
           if ($validator->passes()) {
                    $photoName=null;   
                    $userId=Auth::user()->id;
                    $isExistImage=Province::find($request->_id);                 
             if($request->_thumbnail && $isExistImage->thumbnail==$request->_thumbnail){
                    $photoName=$request->_thumbnail;
                     
             }else{
                        $validator = Validator::make($request->only('thumbnail'), [
                            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                        ]);
                        if ($validator->passes()) {
                              if($request->thumbnail->isValid()) {
                                    $photoName = 'province_'.time().'.'.$request->thumbnail->getClientOriginalExtension();
                                    $request->thumbnail->move(public_path('img/provinces'), $photoName);  
                                }else {
                                        return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]); 
                                }
                        }else {                           
                                 return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]);                            
                        }
                       
             }        
                $user=new User;
                $user=Auth::user();
                $province =Province::find($request->_id);;
                $province->postal_code=$request->postal_code;
                $province->title_khmer=$request->title_khmer;
                $province->title_english=$request->title_english;
                $province->thumbnail=$photoName?$photoName:null;
                $province->description_khmer=$request->description_khmer;
                $province->description_english=$request->description_english;
                $province->status=$request->status=='Enable'?true:false;
                $province->users()->associate($user);
                $province->save();
                return response()->json(['success'=>true,'infor'=>['Province Successful Updated']]);
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
        return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]); 

    }
 
}
