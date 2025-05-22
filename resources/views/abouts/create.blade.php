@extends('admin')

@section('content')
<div >
    <h3>Creer A propos</h3>
    <a href="{{ route('admin.about.index') }}" class="btn btn-success my-1">
            Accueil
    </a>
    @include('abouts/aboutForm')
        </div>
@endsection
