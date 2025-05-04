@extends('admin')

@section('content')
    <div >
        <h3>Modifier la catégorie</h3>
        <a href="{{ route('admin.category.index') }}" class="btn btn-success my-1">
                Accueil
        </a>
        @include('categories/categoryForm', ['category' => $category])
    </div>
@endsection