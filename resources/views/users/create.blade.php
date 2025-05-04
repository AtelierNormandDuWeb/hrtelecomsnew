@extends('admin')

@section('content')
<div >
    <h3>Creer utilisateur</h3>
    <a href="{{ route('admin.user.index') }}" class="btn btn-success my-1">
            Accueil
    </a>
    @include('users/userForm')
        </div>
@endsection
