<?php

namespace App\Http\Controllers;

use App\Models\Classe;
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
        ->orderBy('classes.IdClasse')->get();
        $classes=Classe::all();
        // $eleves->setCollection($eleves->groupBy('classe_id'));
        // $eleves = Eleve::latest()->groupBy('classe_id')->paginate(20);
        // $matieres = Matiere::all();
        // $classes = Classe::all();
        
    
        return view('admin.eleve.index',['eleves'=>$eleves,'classes'=>$classes]);
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
            'GSMPere' => 'nullable|numeric',
            'Classe_id'=>'required'
        ]);
        Eleve::create($request->all());
        
        
        
     
        return redirect()->route('eleves.index')
                        ->with('success','Nouveau eleve crée avec succés.');
        
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
        $eleve = Eleve::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $eleve 
                                  ]);
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
        $eleve=Eleve::find($id)->first();
        $request->validate([
            'CIN' => 'nullable',
            'IdentifiantUnique' => 'required|unique:eleves,IdentifiantUnique',
            'NomPrenom' => 'required',
            'DateNaissance' => 'nullable',
            'Adresse' => 'nullable',
            'NomPere' => 'required',
            'NomMere' => 'nullable',
            'GSMPere' => 'required|numeric',
            'Classe_id'=>'required'
        ]);
    
        // $eleve->update($request->all());
        $eleve->update($request->all());
        // return response()->json([
        //     'success' => true,
           
           
        //        ]); 
     
        return redirect()->route('eleves.index')
                        ->with('success','Matière mise à jour  avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Eleve::find($id)->delete();
     
        // return response()->json(['success'=>'Eleve supprimée avec succés.']);
    
        return redirect()->route('eleves.index')
                        ->with('success','Eleve supprimée avec succés');
    }
}
