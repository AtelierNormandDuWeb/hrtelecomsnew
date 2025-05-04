@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div >
        <h3>Show Title</h3>

        <a href="{{ route('admin.title.index') }}" class="btn btn-success my-1">
            Home
        </a>
        <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
                    <tr>
        <th>Title1</th> 
        <td>{{ $title->title1 }}</td>
</tr>
    <tr>
        <th>Title2</th> 
        <td>{{ $title->title2 }}</td>
</tr>
    <tr>
        <th>Title3</th> 
        <td>{{ $title->title3 }}</td>
</tr>
    <tr>
        <th>Title4</th> 
        <td>{{ $title->title4 }}</td>
</tr>
    <tr>
        <th>Title5</th> 
        <td>{{ $title->title5 }}</td>
</tr>
    <tr>
        <th>Title6</th> 
        <td>{{ $title->title6 }}</td>
</tr>
    <tr>
        <th>Title7</th> 
        <td>{{ $title->title7 }}</td>
</tr>
    <tr>
        <th>Title8</th> 
        <td>{{ $title->title8 }}</td>
</tr>
    <tr>
        <th>Title9</th> 
        <td>{{ $title->title9 }}</td>
</tr>
    <tr>
        <th>Title10</th> 
        <td>{{ $title->title10 }}</td>
</tr>
	
            </tbody>
        </table>

        <div>
            <a href="{{ route('admin.title.edit', ['id' => $title->id]) }}" class="btn btn-primary my-1">
                <i class="fa-solid fa-pen-to-square"></i>  Edit
            </a>
        </div>
    </div>
@endsection