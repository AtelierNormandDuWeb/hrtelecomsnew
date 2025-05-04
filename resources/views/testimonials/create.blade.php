@extends('admin')

@section('content')
<div >
    <h3>Create Testimonial</h3>
    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-success my-1">
            Home
    </a>
    @include('testimonials/testimonialForm')
        </div>
@endsection
