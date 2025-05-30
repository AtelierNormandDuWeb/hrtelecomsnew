@extends('admin')

@section('content')
    <div>
        <h3 class="text-center">Modifier A propos</h3>
        <a href="{{ route('admin.about.index') }}" class="btn btn-info btn-lg mb-3">
            <i class="fa-solid"></i>Accueil
        </a>
        @include('abouts/aboutForm', ['about' => $about])
    </div>
@endsection
