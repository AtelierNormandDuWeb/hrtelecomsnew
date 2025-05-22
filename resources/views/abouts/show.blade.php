@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3>Voir A propos</h3>

        <a href="{{ route('admin.about.index') }}" class="btn btn-success my-1">
            Accueil
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Titre 1</th>
                        <td>{{ $about->title1 }}</td>
                    </tr>
                    <tr>
                        <th>Titre 2</th>
                        <td>{{ $about->title2 }}</td>
                    </tr>
                    <tr>
                        <th>Texte 1</th>
                        <td>{{ $about->texte1 }}</td>
                    </tr>
                    <tr>
                        <th>Texte 2</th>
                        <td>{{ $about->texte2 }}</td>
                    </tr>
                    <tr>
                        <th>Boutton</th>
                        <td>{{ $about->button }}</td>
                    </tr>
                    <tr>
                        <th>ImageUrl</strong></th>
                        <td>
                            <div class="form-group d-flex" id="preview_imageUrl" style="max-width: 100%;">
                                <img src="{{ Str::startsWith($about->imageUrl, 'http') ? $about->imageUrl : Storage::url($about->imageUrl) }}"
                                    alt="Prévisualisation de l'image" style="max-width: 100px; display: block;">
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div>
                <a href="{{ route('admin.about.edit', ['id' => $about->id]) }}" class="btn btn-primary my-1">
                    <i class="fa-solid fa-pen-to-square"></i> Modifier
                </a>
            </div>
        </div>
    @endsection
