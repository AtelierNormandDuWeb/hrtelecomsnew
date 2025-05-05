@extends('admin')

@section('content')
    <div >
        <h3>Edit Contactsujet</h3>
        <a href="{{ route('admin.contactsujet.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('contactsujets/contactsujetForm', ['contactsujet' => $contactsujet])
    </div>
@endsection