@extends('admin')

@section('content')
<div >
    <h3>Create Contactsujet</h3>
    <a href="{{ route('admin.contactsujet.index') }}" class="btn btn-success my-1">
            Home
    </a>
    @include('contactsujets/contactsujetForm')
        </div>
@endsection
