<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $matieres = DB::table('matieres')->paginate(3);

        return view('matieretudiants.index', ['matieres' => $matieres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('matieretudiants.create');
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
            'matiere' => 'required',
            'coef' => 'required',
        ]);

        Matiere::create($request->all());

        return redirect()->route('matieretudiants.index')
            ->with('success','Matière créée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param Matiere $matiere
     * @return Application|Factory|View
     */
    
    public function edit($id)
    {
        $matiere=Matiere::findOrFail($id);

        return view('matieretudiants.edit',compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Matiere $matiere
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request ->validate ([
            'matiere' => 'required',
            'coef' => 'required',
        ]);

            // $matiere->update($request->all());
        Matiere::whereId($id)->update($validatedData);

        return redirect()->route('matieretudiants.index')
            ->with('success','Matière modifiée avec succès !');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Matiere $matiere
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        // $matiere->delete();

        $matiere = Matiere::findOrFail($id);
        $matiere->delete();

        return redirect()->route('matieretudiants.index')
            ->with('success','Matière supprimée avec succès !');
    }

}
