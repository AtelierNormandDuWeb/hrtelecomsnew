@extends('admin')

@section('content')
<div >
    <h3>creer nouveau titre</h3>
    <a href="{{ route('admin.contactsujet.index') }}" class="btn btn-success my-1">
            Accueil
    </a>
    @include('contactsujets/contactsujetForm')
        </div>
@endsection
