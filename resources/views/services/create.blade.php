@extends('admin')

@section('content')
<div >
    <h3>Create Service</h3>
    <a href="{{ route('admin.service.index') }}" class="btn btn-success my-1">
            Home
    </a>
    @include('services/serviceForm')
        </div>
@endsection
