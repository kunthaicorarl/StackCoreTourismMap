<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Province;
use App\User;
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
           $gallery=GalleryType::orderBy('id', 'desc')->paginate(3);
           return view('gallerys.index')->with('displayGallerys',$gallery);
     }
     public function search($q)
      {  
         $user=null;
         if($q){
         $search=$q;
         $user=User::where('name','like','%'.$search.'%')
         ->orWhere('email','like','%'.$search.'%')
         ->orderBy('name')
         ->paginate(50);
         }else{
          $user=User::orderBy('id', 'desc')->paginate(3);
         }
       return view('users.search')->with('displayUsers',$user);
     }
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
        return view('users.create');
     }
     public function detail($id)
     {
          $user = User::find($id);
         return \View::make('users.detail')
             ->with('user', $user);
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
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:6|confirmed',
             ]);
            if ($validator->passes()) {
                 User::create([
                 'name' => $request->name,
                 'email' =>$request->email,
                 'password' => Hash::make($request->password),
               ]);
                 return response()->json(['success'=>true,'infor'=>['User Successful Saved']]);
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
            $user = User::find($id);
         return \View::make('users.edit')
             ->with('user', $user);
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
              
              $arrayError=array();;
              $val1=null;
                $val2=null;
                  $val3=null;
             $validator = Validator::make($request->all(), [
             '_id' => 'required',
             'name' => 'required|string|max:255']);
             // 'email' => 'required|string|email|max:255|unique:users',]);
            if (!$validator->passes()) {
                 return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]); 
            }
            $userHashed=User::find($request->_id)->password;
            $checkHased=Hash::check($request->oldPassword,$userHashed);
            if(!$checkHased)  return response()->json(['success'=>false,'infor'=>['Password is not match!!']]); 
             $validator = Validator::make($request->all(), [
             'password' => 'required|string|min:6|confirmed']);
             if (!$validator->passes()) {
                 return response()->json(['success'=>false,'infor'=>$validator->errors()->all()]); 
             }
             if($request->oldPassword==$request->password)
             {
                 return response()->json(['success'=>false,'infor'=>['You use old password!!']]); 
             }
 
               $user =User::find($request->_id);
               $user->name=$request->name;
               $user->password=Hash::make($request->password);
               $user->save();
               return response()->json(['success'=>true,'infor'=>['User have been updated']]); 
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
