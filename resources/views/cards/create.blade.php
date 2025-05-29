@extends('admin')

@section('content')
<div >
    <h3>Create Cards</h3>
    <a href="{{ route('admin.cards.index') }}" class="btn btn-success my-1">
            Home
    </a>
    @include('cards/cardsForm')
        </div>
@endsection
