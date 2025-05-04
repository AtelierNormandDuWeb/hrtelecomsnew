@extends('admin')

@section('content')
    <div >
        <h3>Modifier la réalisation</h3>
        <a href="{{ route('admin.realization.index') }}" class="btn btn-success my-1">
                Accueil
        </a>
        @include('realizations/realizationForm', ['realization' => $realization])
    </div>
@endsection