@extends('admin')

@section('content')
    <div >
        <h3>Modifier utilisateur</h3>
        <a href="{{ route('admin.user.index') }}" class="btn btn-success my-1">
                Accueil
        </a>
        @include('users/userForm', ['user' => $user])
    </div>
@endsection