@extends('admin')

@section('content')
<div >
    <h3>Create About</h3>
    <a href="{{ route('admin.about.index') }}" class="btn btn-success my-1">
            Home
    </a>
    @include('abouts/aboutForm')
        </div>
@endsection
