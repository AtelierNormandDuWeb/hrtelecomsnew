@extends('admin')

@section('content')
<div >
    <h3>Create Solution</h3>
    <a href="{{ route('admin.solution.index') }}" class="btn btn-success my-1">
            Home
    </a>
    @include('solutions/solutionForm')
        </div>
@endsection
