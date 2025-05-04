@extends('admin')

@section('content')
    <div >
        <h3>Edit Title</h3>
        <a href="{{ route('admin.title.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('titles/titleForm', ['title' => $title])
    </div>
@endsection