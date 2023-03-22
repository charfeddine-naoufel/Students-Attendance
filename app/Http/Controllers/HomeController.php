<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
       $absences=Seance::orderBy('date','desc')->get();
    // dd($absences);
       $abs=[]; 
       $eleves=Eleve::all();
       foreach($eleves as $eleve)
       {
        $abs=Arr::add( $abs,$eleve->id , $eleve->NomPrenom);
       }
       $cls=[]; 
       $classes=Classe::all();
       foreach($classes as $classe)
       {
        $cls=Arr::add( $cls,$classe->IdClasse , $classe->libeclassar);
       }
       $profs=[]; 
       $enseignants=Enseignant::all();
       foreach($enseignants as $enseignant)
       {
        $profs=Arr::add( $profs,$enseignant->id , $enseignant->NomEnseignant);
       }
       $mats=[]; 
       $matieres=Matiere::all();
       foreach($matieres as $matiere)
       {
        $mats=Arr::add( $mats,$matiere->id , $matiere->NomMatiere);
       }
       
            return view('admin.adminDashboard',compact('absences','abs','cls','profs','mats'));

        
          

    }
   
    public function profhome()
    {
        $prof=Enseignant::where('User_id',Auth::user()->id)->first();
       $absences=Seance::where('enseignant_id',$prof->id)->orderBy('date','desc')->get();
        // dd($absences);
       $abs=[]; 
       $eleves=Eleve::all();
       foreach($eleves as $eleve)
       {
        $abs=Arr::add( $abs,$eleve->id , $eleve->NomPrenom);
       }
       $cls=[]; 
       $classes=Classe::all();
       foreach($classes as $classe)
       {
        $cls=Arr::add( $cls,$classe->IdClasse , $classe->libeclassar);
       }
       
            return view('prof.profDashboard',compact('absences','abs','cls'));
        
    }
}
