@extends('admin')

@section('content')
    <div >
        <h3>Edit Info</h3>
        <a href="{{ route('admin.info.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('infos/infoForm', ['info' => $info])
    </div>
@endsection