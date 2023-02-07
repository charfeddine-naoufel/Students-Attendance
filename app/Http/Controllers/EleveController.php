<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the eleves
        // $eleves = Eleve::latest()->paginate(10);
        $eleves = Eleve::select('eleves.*','classes.libeclassar')
        ->join('classes', 'eleves.Classe_id', '=', 'classes.IdClasse')
        ->paginate(10);
        // $eleves->setCollection($eleves->groupBy('classe_id'));
        // $eleves = Eleve::latest()->groupBy('classe_id')->paginate(20);
        // $matieres = Matiere::all();
        // $classes = Classe::all();
        
    
        return view('admin.eleve.index',['eleves'=>$eleves])->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eleve.create');
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
            'CIN' => 'nullable|numeric',
            'IdentifiantUnique' => 'required',
            'NomPrenom' => 'required',
            'DateNaissance' => 'nullable',
            'Adresse' => 'nullable',
            'NomPere' => 'required',
            'NomMere' => 'nullable',
            'GsmPere' => 'required|numeric',
        ]);
        Eleve::create($request->all());
        
        
        
     
        return redirect()->route('eleves.index')
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
        return view('admin.eleve.show',compact('eleve'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matiere = Eleve::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $matiere 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, eleve $eleve)
    {
        $request->validate([
            'CIN' => 'nullable|numeric',
            'IdentifiantUnique' => 'required',
            'NomPrenom' => 'required',
            'DateNaissance' => 'nullable',
            'Adresse' => 'nullable',
            'NomPere' => 'required',
            'NomMere' => 'nullable',
            'GsmPere' => 'required|numeric',
        ]);
    
        $eleve->update($request->all());
        return response()->json([
            'success' => true,
           
               ]); 
     
        // return redirect()->route('eleves.index')
        //                 ->with('success','Matière mise à jour  avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(eleve $eleve)
    {
        $eleve->delete();
    
        return redirect()->route('eleves.index')
                        ->with('success','Eleve supprimée avec succés');
    }
}
