@extends('admin')

@section('content')
    <div >
        <h3>Modifier l'avis</h3>
        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-success my-1">
                Accueil
        </a>
        @include('testimonials/testimonialForm', ['testimonial' => $testimonial])
    </div>
@endsection