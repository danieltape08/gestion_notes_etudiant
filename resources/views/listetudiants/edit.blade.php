@extends('listetudiants.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editer étudiant</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('listetudiants.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif


    <form action="{{ route('listetudiants.update', $etudiant->id) }}" method="POST" style="width: 65%">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="ExempleInputNom" class="form-label">Nom</label>
            <input type="string" class="form-control" value="{{ $etudiant->nom }}" name ="nom">
        </div>
        <div class="mb-3">
            <label for="ExempleInputPrenom" class="form-label">Prénoms</label>
            <input type="string" class="form-control" value="{{ $etudiant->prenom }}" name ="prenom">
        </div>
        <div class="mb-3">
            <label for="ExempleInputSexe" class="form-label">Sexe</label>
            <select class="form-control"  placeholder="M/F" name ="sexe" >
                <option></option>
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ExempleInputClasse" class="form-label">Classe</label>
            <input type="decimal" class="form-control" value="{{ $etudiant->classe_id }}" name ="classe_id">
        </div>

        <button type="submit" class="btn btn-primary"> Enregistrer </button>
    </form>

@endsection

