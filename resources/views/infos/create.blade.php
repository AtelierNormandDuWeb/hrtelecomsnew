@extends('admin')

@section('content')
    <div>
        <h3 class="text-center">Creer</h3>
        <a href="{{ route('admin.info.index') }}" class="btn btn-info btn-lg mb-3">
            <i class="fa-solid"></i>Accueil
        </a>
        @include('infos/infoForm')
    </div>
@endsection
