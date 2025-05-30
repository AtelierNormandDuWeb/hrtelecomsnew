@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3 class="text-center"> Solution</h3>
        <a href="{{ route('admin.solution.index') }}" class="btn btn-info btn-lg mb-3">
            <i class="fa-solid"></i>Accueil
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Boutton 1</th>
                        <td>{{ $solution->button1 }}</td>
                    </tr>
                    <tr>
                        <th>Boutton 2</th>
                        <td>{{ $solution->button2 }}</td>
                    </tr>
                    <tr>
                        <th>Titre</th>
                        <td>{{ $solution->title }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $solution->description }}</td>
                    </tr>
                    <tr>
                        <th>Liste 1</th>
                        <td>{{ $solution->liste1 }}</td>
                    </tr>
                    <tr>
                        <th>Liste 2</th>
                        <td>{{ $solution->liste2 }}</td>
                    </tr>
                    <tr>
                        <th>Liste 3</th>
                        <td>{{ $solution->liste3 }}</td>
                    </tr>
                    <tr>
                        <th>Liste 4</th>
                        <td>{{ $solution->liste4 }}</td>
                    </tr>
                    <tr>
                        <th>Liste 5</th>
                        <td>{{ $solution->liste5 }}</td>
                    </tr>
                    <tr>
                        <th>ImageUrl</strong></th>
                        <td>
                            <div class="form-group d-flex" id="preview_imageUrl" style="max-width: 100%;">
                                <img src="{{ Str::startsWith($solution->imageUrl, 'http') ? $solution->imageUrl : Storage::url($solution->imageUrl) }}"
                                    alt="Prévisualisation de l'image" style="max-width: 100px; display: block;">
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
            <div>
                <a href="{{ route('admin.solution.edit', ['id' => $solution->id]) }}"
                    class="btn btn-success btn-lg">Modifier
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
        </div>
    @endsection
