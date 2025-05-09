@extends('admin')

@section('content')
    <div >
        <h3>Edit Phoneslider</h3>
        <a href="{{ route('admin.phoneslider.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('phonesliders/phonesliderForm', ['phoneslider' => $phoneslider])
    </div>
@endsection