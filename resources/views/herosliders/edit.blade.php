@extends('admin')

@section('content')
    <div >
        <h3>Edit Heroslider</h3>
        <a href="{{ route('admin.heroslider.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('herosliders/herosliderForm', ['heroslider' => $heroslider])
    </div>
@endsection