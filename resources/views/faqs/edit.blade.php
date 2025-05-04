@extends('admin')

@section('content')
    <div >
        <h3>Edit Faq</h3>
        <a href="{{ route('admin.faq.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('faqs/faqForm', ['faq' => $faq])
    </div>
@endsection