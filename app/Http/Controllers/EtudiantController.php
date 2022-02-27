<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $etudiants = DB::table('etudiants')->paginate(3);
        return view('listetudiants.index', ['etudiants' => $etudiants]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $classes = Classe::all();
        return view('listetudiants.create',compact('classes'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'classe_id' => 'required',           
        ]);
        
        
        Etudiant::create($request->all());

        return redirect()->route('listetudiants.index')
            ->with('success','Etudiant créé avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param Etudiant $etudiant
     * @return Application|Factory|View
     */
    public function show(Etudiant $etudiant)
    {
        $etudiants = Etudiant::all();

        return view('listetudiants.show',compact('etudiants'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Etudiant $etudiant
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);

        return view('listetudiants.edit',compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Etudiant $etudiant
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request ->validate ([
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'classe_id' => 'required',
        ]);

            // $etudiant->update($request->all());
        Etudiant::whereId($id)->update($validatedData);

        return redirect()->route('listetudiants.index')
            ->with('success','Etudiant modifié avec succès !');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Etudiant $etudiant
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        // $etudiant->delete();

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('listetudiants.index')
            ->with('success','Etudiant supprimé avec succès.');
    }

}
