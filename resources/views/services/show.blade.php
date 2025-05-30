@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3>Show Service</h3>
        <h3 class="text-center"> Service</h3>
        <a href="{{ route('admin.service.index') }}" class="btn btn-info btn-lg mb-3">
            <i class="fa-solid"></i>Accueil
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Incontext</th>
                        <td>{{ $service->incontext }}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $service->title }}</td>
                    </tr>
                    <tr>
                        <th>Text</th>
                        <td>{{ $service->text }}</td>
                    </tr>

                </tbody>
            </table>
            <div>
                <a href="{{ route('admin.service.edit', ['id' => $service->id]) }}" class="btn btn-success btn-lg">Modifier
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
        </div>
    @endsection
