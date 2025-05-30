@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3 class="text-center"> Question/Reponse</h3>
        <a href="{{ route('admin.faq.index') }}" class="btn btn-info btn-lg mb-3">
            <i class="fa-solid"></i>Accueil
        </a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Question</th>
                        <td>{{ $faq->question }}</td>
                    </tr>
                    <tr>
                        <th>Response</th>
                        <td>{{ $faq->response }}</td>
                    </tr>

                </tbody>
            </table>
            <div>
                <a href="{{ route('admin.faq.edit', ['id' => $faq->id]) }}" class="btn btn-success btn-lg">Modifier
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
        </div>
    @endsection
