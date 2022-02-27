@extends('listetudiants.layout')

@section('content')

    <div class="row">
         <div class="container-fluid">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Ajouter un nouvel classe </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('classetudiants.index') }}"> Retour </a>
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

    <form action="{{ route('classetudiants.store') }}" method="POST" style="width: 65%">
        @csrf
        <div class="mb-3">
            <label for="ExempleInputClasse" class="form-label">Classe</label>
            <input type="text" class="form-control"  placeholder="Classe" name ="classe">
        </div>
        
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>

@endsection
