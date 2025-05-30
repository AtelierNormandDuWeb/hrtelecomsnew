@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3 class="text-center"> L'équipe</h3>
        <a href="{{ route('admin.cards.index') }}" class="btn btn-info btn-lg mb-3">
            <i class="fa-solid"></i>Accueil
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nom</th>
                        <td>{{ $cards->name }}</td>
                    </tr>
                    <tr>
                        <th>Titre</th>
                        <td>{{ $cards->title }}</td>
                    </tr>
                    <tr>
                        <th>Rôle</th>
                        <td>{{ $cards->subtitle }}</td>
                    </tr>
                    <tr>
                        <th>Image de l'avatar</th>
                        <td>
                            <div class="form-group d-flex" id="preview_avatar_url" style="max-width: 100%;">
                                <img src="{{ Str::startsWith($cards->avatar_url, 'http') ? $cards->avatar_url : Storage::url($cards->avatar_url) }}"
                                    alt="Prévisualisation de l'image" style="max-width: 100px; display: block;">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Image du Papier-Peint</th>
                        <td>
                            <div class="form-group d-flex" id="preview_background_url" style="max-width: 100%;">
                                <img src="{{ Str::startsWith($cards->background_url, 'http') ? $cards->background_url : Storage::url($cards->background_url) }}"
                                    alt="Prévisualisation de l'image" style="max-width: 100px; display: block;">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $cards->description }}</td>
                    </tr>
                    <tr>
                        <th>Details</th>
                        <td>{{ $cards->details }}</td>
                    </tr>
                    <tr>
                        <th>Adresse mail et/ou téléphone</th>
                        <td>{{ $cards->contact_info }}</td>
                    </tr>
                    <tr>
                        <th>Ordre d'affichage</th>
                        <td>{{ $cards->sort_order }}</td>
                    </tr>

                </tbody>
            </table>
            <div>
                <a href="{{ route('admin.cards.edit', ['id' => $cards->id]) }}" class="btn btn-success btn-lg">Modifier
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
        </div>
    @endsection
