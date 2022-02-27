<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Note;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $notes = DB::table('notes')->paginate(3);

        return view('notetudiants.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $matieres = Matiere::all();
        $etudiants = Etudiant::all();
        return view('notetudiants.create',compact('matieres','etudiants'));
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
            'note' => 'required',
            'etudiant_id' => 'required',
            'matiere_id' => 'required',
        ]);

        Note::create($request->all());

        return redirect()->route('notetudiants.index')
            ->with('success','Note créée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param Note $note
     * @return Application|Factory|View
     */
    
    public function show(Note $note)
    {
        $notes =Note::all();

        return view('notetudiants.show',compact('notes'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param Note $note
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $note =Note::findOrFail($id);
        $etudiants = Etudiant::all();
        $matieres = Matiere::all();
        return view('notetudiants.edit',compact('note','etudiants', 'matieres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Note $note
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request ->validate ([
            'note' => 'required',
            'etudiant_id' => 'required',
            'matiere_id' => 'required',
        ]);

            // $note->update($request->all());
        Note::whereId($id)->update($validatedData);

        return redirect()->route('notetudiants.index')
            ->with('success','Note modifiée avec succès !');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Note $note
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        // $note->delete();

        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notetudiants.index')
            ->with('success','Note supprimée avec succès !');
    }

}
