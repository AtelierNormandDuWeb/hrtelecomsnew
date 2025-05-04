@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3>Voir les réalisations</h3>

        <a href="{{ route('admin.realization.index') }}" class="btn btn-success my-1">
            Accueil
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nom</th>
                        <td>{{ $realization->name }}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ $realization->slug }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $realization->description }}</td>
                    </tr>
                    <tr>
                        <th>Détails du Chantier</th>
                        <td>{!! $realization->moreDescription !!}</td>
                    </tr>
                    <tr>
                        <th>Lieu du chantier</th>
                        <td>{!! $realization->additionalInfos !!}</td>
                    </tr>
                    <tr>
                        <th>ImageUrls</th>
                        <td>
                            <div class="form-group d-flex" id="preview_imageUrls" style="max-width: 100%;">
                                @foreach ($realization->imageUrls as $url)
                                    <img src="{{ Str::startsWith($url, 'http') ? $url : Storage::url($url) }}"
                                        alt="Prévisualisation de l'image" style="max-width: 100px; display: block;" />
                                @endforeach
                            </div>

                        </td>
                    </tr>

                </tbody>
            </table>

            <div>
                <a href="{{ route('admin.realization.edit', ['id' => $realization->id]) }}" class="btn btn-primary my-1">
                    <i class="fa-solid fa-pen-to-square"></i> Modifier
                </a>
            </div>
        </div>
    @endsection
