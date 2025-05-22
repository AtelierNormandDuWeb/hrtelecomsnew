@extends('admin')

@section('content')
    <div>
        <h3>Modifier Info</h3>
        <a href="{{ route('admin.info.index') }}" class="btn btn-success my-1">
            Accueil
        </a>
        @include('infos/infoForm', ['info' => $info])
    </div>
@endsection
