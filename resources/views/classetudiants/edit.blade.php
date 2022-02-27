@extends('listetudiants.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editer Classe</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('classetudiants.index') }}"> Retour </a>
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


    <form action="{{ route('classetudiants.update',$classe->id) }}" method="POST" style="width: 65%">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="classe">Classe</label>
            <input type="text" class="form-control" value="{{ $classe->classe }}" name ="classe">
        </div>
        
        <button type="submit" class="btn btn-primary"> Enregistrer </button>
    </form>

@endsection

