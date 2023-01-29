<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the classes
        $classes = Classe::latest()->paginate(20);

    
        return view('admin.classe.index',compact('classes'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classe.create');
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
            'IdClasse' => 'required|numeric',
            'IDNbrClasse' => 'required',
            'ََAnneeScol' => 'required|date',
            'LibClassear' => 'required',
        ]);
    // dd($request);
        Classe::create($request->all());
     
        return redirect()->route('classes.index')
                        ->with('success','Nouvelle classe crée avec succés.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdClasse)
    {
        // dd($IdClasse);
        $classe=Eleve::where('Classe_id',$IdClasse)->get();
        // $classe=Classe::where('IdClasse',$IdClasse)->eleves;
        return view('admin.classe.show',compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classe = Classe::find($id); 
                return response()->json([
                               'success' => true,
                                'data' => $classe 
                                  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, classe $classe)
    {
        $request->validate([
            'IdClasse' => 'required|numeric',
            'IDNbrClasse' => 'required',
            'ََAnneeScol' => 'required|date',
            'LibClassear' => 'required',
        ]);
    
        $classe->update($request->all());
        return response()->json([
            'success' => true,
           
               ]); 
     
        // return redirect()->route('classes.index')
        //                 ->with('success','Matière mise à jour  avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(classe $classe)
    {
        $classe->delete();
    
        return redirect()->route('classes.index')
                        ->with('success','Classe supprimée avec succés');
    }
}
