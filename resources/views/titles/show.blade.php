@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3 class="text-center"> Titres</h3>
        <a href="{{ route('admin.title.index') }}" class="btn btn-info btn-lg mb-3">
            <i class="fa-solid"></i>Accueil
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Titre 1</th>
                        <td>{{ $title->title1 }}</td>
                    </tr>
                    <tr>
                        <th>Titre 2</th>
                        <td>{{ $title->title2 }}</td>
                    </tr>
                    <tr>
                        <th>Titre 3</th>
                        <td>{{ $title->title3 }}</td>
                    </tr>
                    <tr>
                        <th>Titre 4</th>
                        <td>{{ $title->title4 }}</td>
                    </tr>
                    <tr>
                        <th>Titre 5</th>
                        <td>{{ $title->title5 }}</td>
                    </tr>
                    <tr>
                        <th>Titre 6</th>
                        <td>{{ $title->title6 }}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <a href="{{ route('admin.title.edit', ['id' => $title->id]) }}" class="btn btn-success btn-lg">Modifier
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
        </div>
    @endsection
