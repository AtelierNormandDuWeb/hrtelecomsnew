@extends('admin')

@section('content')
    <div>
        <h3 class="text-center">Modifier utilisateur</h3>
        <a href="{{ route('admin.user.index') }}" class="btn btn-info btn-lg mb-3">
            <i class="fa-solid"></i>Accueil
        </a>
        @include('users/userForm', ['user' => $user])
    </div>
@endsection
