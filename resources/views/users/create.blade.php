@extends('admin')

@section('content')
    <div>

        <h3 class="text-center">Nouvel utilisateur</h3>
        <a href="{{ route('admin.user.index') }}" class="btn btn-info btn-lg mb-3">
            <i class="fa-solid"></i>Accueil
        </a>
        @include('users/userForm')
    </div>
@endsection
