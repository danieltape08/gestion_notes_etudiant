@extends('listetudiants.layout')

@section('content')

    <div class="row">
         <div class="container-fluid">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Ajouter un nouvel étudiant </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('listetudiants.index') }}"> Retour </a>
                </div>
            </div>
         </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong> Attention! </strong> Veuillez vérifier vos champs. <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('listetudiants.store') }}" method="POST" style="width: 65%">
        @csrf
        <div class="mb-3">
            <label for="ExempleInputNom" class="form-label">Nom</label>
            <input type="string" class="form-control"  placeholder="Nom" name ="nom">
        </div>
        <div class="mb-3">
            <label for="ExempleInputPrenom" class="form-label">Prénoms</label>
            <input type="string" class="form-control"  placeholder="Prenoms" name ="prenom">
        </div>
        <div class="mb-3">
            <label for="ExempleInputSexe" class="form-label" required>Sexe</label>
            
            <select class="form-control"  placeholder="M/F" name ="sexe" >
                <option></option>
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ExempleInputClasse" class="form-label" required>Classe</label>
            <select class="form-control"  placeholder="classe" name ="classe_id" >
                @foreach ($classes as $classe)
                    <option></option>
                    <option value="{{$classe->id}}">{{$classe->classe}}</option>
                @endforeach       
            </select>
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>

@endsection

