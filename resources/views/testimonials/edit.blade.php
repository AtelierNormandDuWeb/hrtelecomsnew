@extends('admin')

@section('content')
    <div >
        <h3>Edit Testimonial</h3>
        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('testimonials/testimonialForm', ['testimonial' => $testimonial])
    </div>
@endsection