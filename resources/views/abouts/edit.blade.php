@extends('admin')

@section('content')
    <div >
        <h3>Edit About</h3>
        <a href="{{ route('admin.about.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('abouts/aboutForm', ['about' => $about])
    </div>
@endsection