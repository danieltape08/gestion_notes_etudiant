<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $classes = DB::table('classes')->paginate(3);

        return view('classetudiants.index', ['classes' => $classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('classetudiants.create');
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
            'classe' => 'required',
        ]);

        Classe::create($request->all());

        return redirect()->route('classetudiants.index')
            ->with('success','Classe créée avec succès !');
    }


    /**
     * Display the specified resource.
     *
     * @param Classe $classe
     * @return Application|Factory|View
     */
    
    
     public function edit($id)
    {
        $classe = Classe::findOrFail($id);

        return view('classetudiants.edit',compact('classe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Classe $classe
     * @return RedirectResponse
     */
    
     public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request ->validate ([
            'classe' => 'required',
        ]);

            // $etudiant->update($request->all());
        Classe::whereId($id)->update($validatedData);

        return redirect()->route('classetudiants.index')
            ->with('success','Classe modifiée avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Classe $classe
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        // $classe->delete();

        $classe = Classe::findOrFail($id);
        $classe->delete();

        return redirect()->route('classetudiants.index')
            ->with('success','Classe supprimée avec succès.');
    }

}

    