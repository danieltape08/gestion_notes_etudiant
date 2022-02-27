@extends('listetudiants.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editer matière</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('matieretudiants.index') }}"> Retour </a>
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


    <form action="{{ route('matieretudiants.update',$matiere->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="string">Matiere</label>
            <input type="text" class="form-control" value="{{ $matiere->matiere }}" name ="matiere">
        </div>
        <div class="mb-3">
            <label for="float">Coefficient</label>
            <input type="text" class="form-control" value="{{ $matiere->coef }}" name ="coef">
        </div>
        

        <button type="submit" class="btn btn-primary"> Enregistrer </button>
    </form>

@endsection

