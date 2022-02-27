@extends('listetudiants.layout')

@section('content')

    <div class="row">
         <div class="container-fluid">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Ajouter une note à un etudiant </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('notetudiants.index') }}"> Retour </a>
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

    <form action="{{ route('notetudiants.store') }}" method="POST" style="width: 65%">
        @csrf
        <div class="mb-3">
            <label for="ExempleInputIdetudiant" class="form-label">Id étudiant</label>
                <select class="form-control"  placeholder="Id_etudiant" name ="etudiant_id" required>
                    @foreach ($etudiants as $etudiant)
                        <option></option>
                        <option value="{{$etudiant->id}}">{{$etudiant->id}}</option>
                    @endforeach       
                </select>
        </div>
        <div class="mb-3">
            <label for="ExempleInputMatiere" class="form-label">Matière</label>
                <select class="form-control"  placeholder="Matiere" name ="matiere_id" required>
                    @foreach ($matieres as $matiere)
                        <option value="--selection"></option>
                        <option value="{{$matiere->id}}">{{$matiere->matiere}}</option>
                    @endforeach       
                </select>
        </div>
        <div class="mb-3">
            <label for="ExempleInputNote" class="form-label">Note</label>
            <input type="text" class="form-control"  placeholder="/20" name ="note" required>
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>

@endsection
