@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3 class="text-center"> Informations</h3>
        <a href="{{ route('admin.info.index') }}" class="btn btn-info btn-lg mb-3">
            <i class="fa-solid"></i>Accueil
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Adresse</th>
                        <td>{{ $info->adresse }}</td>
                    </tr>
                    <tr>
                        <th>Codepostal</th>
                        <td>{{ $info->codepostal }}</td>
                    </tr>
                    <tr>
                        <th>Ville</th>
                        <td>{{ $info->ville }}</td>
                    </tr>
                    <tr>
                        <th>Pays</th>
                        <td>{{ $info->pays }}</td>
                    </tr>
                    <tr>
                        <th>Telephone</th>
                        <td>{{ $info->telephone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $info->email }}</td>
                    </tr>
                    <tr>
                        <th>Lundi</th>
                        <td>{{ $info->lundi }}</td>
                    </tr>
                    <tr>
                        <th>Mardi</th>
                        <td>{{ $info->mardi }}</td>
                    </tr>
                    <tr>
                        <th>Mercredi</th>
                        <td>{{ $info->mercredi }}</td>
                    </tr>
                    <tr>
                        <th>Jeudi</th>
                        <td>{{ $info->jeudi }}</td>
                    </tr>
                    <tr>
                        <th>Vendredi</th>
                        <td>{{ $info->vendredi }}</td>
                    </tr>
                    <tr>
                        <th>Samedi</th>
                        <td>{{ $info->samedi }}</td>
                    </tr>
                    <tr>
                        <th>Dimanche</th>
                        <td>{{ $info->dimanche }}</td>
                    </tr>

                </tbody>
            </table>
            <div>
                <a href="{{ route('admin.info.edit', ['id' => $info->id]) }}" class="btn btn-success btn-lg">Modifier
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
        </div>
    @endsection
