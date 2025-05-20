@extends('admin')

@section('content')
    <div >
        <h3>Modifier Titre</h3>
        <a href="{{ route('admin.title.index') }}" class="btn btn-success my-1">
                Accueil
        </a>
        @include('titles/titleForm', ['title' => $title])
    </div>
@endsection