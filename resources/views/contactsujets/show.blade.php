@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3>Voir contact</h3>

        <a href="{{ route('admin.contactsujet.index') }}" class="btn btn-success my-1">
            Accueil
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Sujet</th>
                        <td>{{ $contactsujet->sujet }}</td>
                    </tr>
                </tbody>
            </table>

            <div>
                <a href="{{ route('admin.contactsujet.edit', ['id' => $contactsujet->id]) }}" class="btn btn-primary my-1">
                    <i class="fa-solid fa-pen-to-square"></i> Modifier
                </a>
            </div>
        </div>
    @endsection
