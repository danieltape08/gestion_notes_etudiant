
@extends('listetudiants.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editer la note</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('notetudiants.index') }}"> Retour </a>
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


    <form action="{{ route('notetudiants.update',$note->id) }}" method="POST" style="width:65%">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="id_etudiant">Id_etudiant</label>
            <select class="form-control"  placeholder="Id_etudiant" name ="etudiant_id" required>
                @foreach ($etudiants as $etudiant)
                    <option></option>
                    <option value="{{$etudiant->id}}">{{$etudiant->id}}</option>
                @endforeach       
            </select>
        </div>
        <div class="mb-3">
            <label for="id_etudiant">Id_matiere</label>
            <select class="form-control"  placeholder="Matiere" name ="matiere_id" required>
                @foreach ($matieres as $matiere)
                    <option value="--selection"></option>
                    <option value="{{$matiere->id}}">{{$matiere->matiere}}</option>
                @endforeach       
            </select>
        </div>
        <div class="mb-3">
            <label for="classe">Note</label>
            <input type="text" class="form-control" value="{{ $note->note }}" name ="note">
        </div>

        <button type="submit" class="btn btn-primary"> Enregistrer </button>
    </form>

@endsection

