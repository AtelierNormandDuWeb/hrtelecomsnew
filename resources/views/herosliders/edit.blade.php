@extends('admin')

@section('content')
    <div >
        <h3>Modifier heroslider</h3>
        <a href="{{ route('admin.heroslider.index') }}" class="btn btn-success my-1">
                Accueil
        </a>
        @include('herosliders/herosliderForm', ['heroslider' => $heroslider])
    </div>
@endsection