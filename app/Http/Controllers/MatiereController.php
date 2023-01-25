<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the matieres
        $matieres = Matiere::latest()->paginate(20);

    
        return view('admin.matiere.index',compact('matieres'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.matiere.create');
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
            'CodeMatiere' => 'required|numeric',
            'NomMatiere' => 'required',
        ]);
    // dd($request);
        Matiere::create($request->all());
     
        return redirect()->route('matieres.index')
                        ->with('success','Nouvelle matière crée avec succés.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.matiere.show',compact('matiere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matiere = Matiere::find($id); 
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
    public function update(Request $request, matiere $matiere)
    {
        $request->validate([
            'CodeMatiere' => 'required|numeric',
            'NomMatiere' => 'required',
        ]);
    
        $matiere->update($request->all());
        return response()->json([
            'success' => true,
           
               ]); 
     
        // return redirect()->route('matieres.index')
        //                 ->with('success','Matière mise à jour  avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(matiere $matiere)
    {
        $matiere->delete();
    
        return redirect()->route('matieres.index')
                        ->with('success','Matière supprimée avec succés');
    }
}
