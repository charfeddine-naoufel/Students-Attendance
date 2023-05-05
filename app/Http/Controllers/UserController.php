<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         // get all the users
         $users = User::orderBy('id', 'asc')->paginate(30);
         
         
     
         return view('admin.user.index',['users'=>$users])->with('i', (request()->input('page', 1) - 1) * 20);
     }
 
       
     
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('admin.user.create');
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         
         $request->validate([
             'name' => 'required|unique:users,name',
             'email' => 'required|email|unique:users,email',
             'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
             'role' => 'required',
            
         ]);
         $request['password']=bcrypt($request->password);
         User::create($request->all());
         
         
         
      
         return redirect()->route('users.index')
                         ->with('success','Nouvel utilisateur crée avec succés.');
         
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         return view('admin.user.show',compact('user'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
        $user=User::whereId($id)->first();
        return view('prof.profile.editprofile',compact('user'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     { $user=User::whereId($id)->first();
        //  dd($user);
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'role' => 'required',
           
        ]);
         
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password=bcrypt($request->password);
         $user->role=$request->role;
         
         $user->save();
 
         
        //  return response()->json([
        //      'success' => true,
            
        //         ]); 
         return redirect()->route('prof.home')
                         ->with('success','Profile mis à jour  avec succés.');
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy(user $user)
     {
         $user->delete();
     
         return redirect()->route('users.index')
                         ->with('success','Utilisateur supprimé avec succés');
     }
 }
