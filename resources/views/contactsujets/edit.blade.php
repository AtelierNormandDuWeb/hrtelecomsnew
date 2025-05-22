@extends('admin')

@section('content')
    <div >
        <h3>Modifier titre contact</h3>
        <a href="{{ route('admin.contactsujet.index') }}" class="btn btn-success my-1">
                Accueil
        </a>
        @include('contactsujets/contactsujetForm', ['contactsujet' => $contactsujet])
    </div>
@endsection