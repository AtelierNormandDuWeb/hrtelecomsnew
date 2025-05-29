@extends('admin')

@section('content')
    <div >
        <h3>Edit Cards</h3>
        <a href="{{ route('admin.cards.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('cards/cardsForm', ['cards' => $cards])
    </div>
@endsection