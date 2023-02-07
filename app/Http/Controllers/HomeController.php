<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        

            return view('admin.adminDashboard');
        
          

    }
    public function profhome()
    {
        $userId=Auth::user()->id;  
        $prof=Enseignant::where('User_id',$userId)->first();
       $classes=$prof->classes;
       $eleves=[];
       foreach ($classes as $classe) {
        $eleves[$classe->IdClasse]=$classe->eleves;
    }     
        
    //    dd($eleves);
            return view('prof.profDashboard',compact('eleves'));
        
    }
}
