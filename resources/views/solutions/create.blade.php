@extends('admin')

@section('content')
<div >
    <h3>Creer nouvelle Solution</h3>
    <a href="{{ route('admin.solution.index') }}" class="btn btn-success my-1">
            Accueil
    </a>
    @include('solutions/solutionForm')
        </div>
@endsection
