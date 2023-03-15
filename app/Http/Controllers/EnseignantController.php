<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnseignantController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the enseignants
        $enseignants = Enseignant::orderBy('id', 'asc')->paginate(30);
        $matieres = Matiere::all();
        $classes = Classe::all();
        $users = User::all();
        
    
        return view('admin.prof.index',['enseignants'=>$enseignants,'matieres'=>$matieres ,'classes'=>$classes,'users'=>$users])->with('i', (request()->input('page', 1) - 1) * 20);
    }

    //mes classes
    public function mesclasses()
    {
        $userId=Auth::user()->id;  
        $prof=Enseignant::where('User_id',$userId)->first();
       $classes=$prof->classes;
       $eleves=[];
       foreach ($classes as $classe) {
        $eleves[$classe->IdClasse]=$classe->eleves;
        }     
        
    //    dd($eleves);
            return view('prof.classe.index',compact('eleves'));
        
    }   
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prof.create');
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
            'CodeEnseignant' => 'required|numeric',
            'NomEnseignant' => 'required',
            'Matiere_id' => 'required',
            'User_id' => 'required|unique:enseignants',
            'Grade' => 'nullable',
            'Type' => 'nullable',
            'classes' => 'nullable',
        ]);
        $newRequest = \Illuminate\Http\Request::capture();
        $newRequest->replace($request->except(['classes']));
        $prof = Enseignant::create($newRequest->all());
        //  dd($request);
    // $regions  = [1, 2, 3];
    $classes = $request->classes;
// dd($classes);
      
        $prof->classes()->attach($classes);
        
        
     
        return redirect()->route('enseignants.index')
                        ->with('success','Nouveau Enseignant crée avec succés.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.prof.show',compact('matiere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enseignant = Enseignant::find($id); 
        $classes=$enseignant->classes;
        // $classes_enseignant=DB::table('classe_enseignant')->where('enseignant_id',$id)->get();
                return response()->json([
                               'success' => true,
                                'data' => $enseignant ,
                                'myclasses' => $classes
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, enseignant $enseignant)
    { 
        $request->validate([
            'CodeEnseignant' => 'required|numeric',
            'NomEnseignant' => 'required',
            'Matiere_id' => 'required',
            'User_id'=> 'required',
            'Grade' => 'nullable',
            'Type' => 'nullable',
            // 'Classes' => 'nullable',
        ]);
        
        $enseignant->CodeEnseignant=$request->CodeEnseignant;
        $enseignant->NomEnseignant=$request->NomEnseignant;
        $enseignant->Matiere_id=$request->Matiere_id;
        $enseignant->User_id=$request->User_id;
        $enseignant->Grade=$request->Grade;
        $enseignant->Type=$request->Type;
        $enseignant->save();

        $classes = $request->Classes;
// dd($classes);
      if ($classes ){
        // DB::table('classe_enseignant')::find(1)->classes()->detach($enseignant);
       DB::table('classe_enseignant')->where('enseignant_id',$enseignant->id)->get()->each(function ($classe) {
            $enseignant=Enseignant::where('id',$classe->enseignant_id)->first();
            $enseignant->classes()->detach($classe);
            // $classe->destroy();
    
        });
        
        $enseignant->classes()->attach($classes);
      };
        return response()->json([
            'success' => true,
           
               ]); 
     
        // return redirect()->route('enseignants.index')
        //                 ->with('success','Matière mise à jour  avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(enseignant $enseignant)
    {
        $enseignant->delete();
    
        return redirect()->route('enseignants.index')
                        ->with('success','Enseignant supprimée avec succés');
    }
}
