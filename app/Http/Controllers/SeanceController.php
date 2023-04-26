<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

   
    public function absence($id)
    {     
        $classe=Classe::where('IdClasse',$id)->first();
    //   dd($classe);
      
        $matieres=Matiere::all();
        // dd($classe->eleves);
        return view("prof.absence.seance",compact('classe','matieres'));
    }
    // enregistrer présence
    public function store_absence(Request $request)
    { 
        //  dd($request);
        $prof=Enseignant::where('user_id',Auth::user()->id)->first();
        $input = $request->all();
        $input['absents'] = $request->input('absents', []);
        $input['exclus'] = $request->input('exclus', []);
        $input['enseignant_id'] = $prof->id;
        // dd($input);
        Seance::create($input);
        return redirect()->route('prof.home')
                        ->with('success','Absense enregistrée.');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function show(Seance $seance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $seance =Seance::where('id',$id)->first();
         $classe=Classe::where('IdClasse',$seance->classe_IdClasse)->first();
         $matiere=Matiere::where('id',$seance->matiere_id)->first();
         $matieres=Matiere::all();
         $eleves=$classe->eleves;
        //  dd($classe);
                return response()->json([
                               'success' => true,
                                'data' => $seance,
                                'classe'=>$classe,
                                'matieres'=>$matieres,
                                'matiere'=>$matiere,
                                'eleves'=>$eleves
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seance $seance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seance $seance)
    {
        $seance->delete();
     
    
        return redirect()->route('prof.home')
                        ->with('success','Seance supprimée avec succés');
    }
}
