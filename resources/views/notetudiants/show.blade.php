@extends('listetudiants.layout')

@section('content')

    <div class="row">
        <div class="container-fluid">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Vue étudiant </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('listetudiants.index') }}"> Retour </a>
                </div>
            </div>
        </div>
    </div>



        <header class="card-header">

            @csrf
                @foreach ($notes as $note)
                
                        <p class="card-header-title">Id : {{ $note->id }}</p>

                                    <p> Nom : {{ $note->note }}</p>

                                    <p> Prénoms : {{ $note->matiere_id }}</p>

                                    <p> Classe : {{ $note->etudiant_id }}</p>

                @endforeach
            

        </header>




@endsection

