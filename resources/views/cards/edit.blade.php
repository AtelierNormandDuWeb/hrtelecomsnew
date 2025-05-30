@extends('admin')

@section('content')
    <div>
        <h3 class="text-center">Modifier</h3>
        <a href="{{ route('admin.cards.index') }}" class="btn btn-info btn-lg mb-3">
            <i class="fa-solid"></i>Accueil
        </a>
        @include('cards/cardsForm', ['cards' => $cards])
    </div>
@endsection
