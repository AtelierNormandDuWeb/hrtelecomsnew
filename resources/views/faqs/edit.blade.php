@extends('admin')

@section('content')
    <div >
        <h3>Modifier question/reponse</h3>
        <a href="{{ route('admin.faq.index') }}" class="btn btn-success my-1">
                Accueil
        </a>
        @include('faqs/faqForm', ['faq' => $faq])
    </div>
@endsection