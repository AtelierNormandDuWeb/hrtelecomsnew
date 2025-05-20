@extends('admin')

@section('content')
<div >
    <h3>Creer Titre</h3>
    <a href="{{ route('admin.title.index') }}" class="btn btn-success my-1">
            Accueil
    </a>
    @include('titles/titleForm')
        </div>
@endsection
