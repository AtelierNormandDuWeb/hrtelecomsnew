@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3>Show Cards</h3>

        <a href="{{ route('admin.cards.index') }}" class="btn btn-success my-1">
            Home
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $cards->name }}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $cards->title }}</td>
                    </tr>
                    <tr>
                        <th>Subtitle</th>
                        <td>{{ $cards->subtitle }}</td>
                    </tr>
                    <tr>
                        <th>Avatar_url</th>
                        <td>
                            <div class="form-group d-flex" id="preview_avatar_url" style="max-width: 100%;">
                                <img src="{{ Str::startsWith($cards->avatar_url, 'http') ? $cards->avatar_url : Storage::url($cards->avatar_url) }}"
                                    alt="Prévisualisation de l'image" style="max-width: 100px; display: block;">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Background_url</th>
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
                        <th>Contact_info</th>
                        <td>{{ $cards->contact_info }}</td>
                    </tr>
                    <tr>
                        <th>Sort_order</th>
                        <td>{{ $cards->sort_order }}</td>
                    </tr>

                </tbody>
            </table>

            <div>
                <a href="{{ route('admin.cards.edit', ['id' => $cards->id]) }}" class="btn btn-primary my-1">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
            </div>
        </div>
    @endsection
