@extends('admin')

@section('content')
<div >
    <h3>Creer une réalisation</h3>
    <a href="{{ route('admin.realization.index') }}" class="btn btn-success my-1">
            Accueil
    </a>
    @include('realizations/realizationForm')
        </div>
@endsection
