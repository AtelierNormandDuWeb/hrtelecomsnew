@extends('admin')

@section('content')
    <div>
        <h3>Creer nouveau</h3>
        <a href="{{ route('admin.info.index') }}" class="btn btn-success my-1">
            Accueil
        </a>
        @include('infos/infoForm')
    </div>
@endsection
