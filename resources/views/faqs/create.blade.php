@extends('admin')

@section('content')
    <div>
        <h3>Creer question/reponse</h3>
        <a href="{{ route('admin.faq.index') }}" class="btn btn-success my-1">
            Accueil
        </a>
        @include('faqs/faqForm')
    </div>
@endsection
