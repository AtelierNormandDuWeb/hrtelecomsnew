@extends('admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .user-show-section {
            padding: 2rem;
            max-width: 700px;
            margin: 2rem auto;
            background-color: #f9f9f9;
            border-radius: 1rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .user-show-section h3 {
            font-size: 2rem;
            color: #333;
            text-align: center;
            margin-bottom: 2rem;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }

        .user-table th,
        .user-table td {
            padding: 1rem;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .user-table th {
            background-color: #eee;
            color: #111;
            width: 30%;
        }

        .user-table td {
            background-color: #fff;
            color: #333;
        }

        .btn-custom {
            display: inline-block;
            padding: 0.7rem 1.2rem;
            border-radius: 0.5rem;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
            margin-right: 1rem;
            margin-bottom: 1rem;
        }

        .btn-custom.success {
            background-color: var(--golden-1, #3f72af);
            color: #fff;
        }

        .btn-custom.success:hover {
            background-color: #3f72af;
        }

        .btn-custom.primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-custom.primary:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            .user-show-section {
                padding: 1rem;
            }

            .user-table th,
            .user-table td {
                padding: 0.7rem;
                font-size: 0.9rem;
            }
        }
        
    </style>
@endsection

@section('content')
    <div class="user-show-section">
        <h3>Voir l'utilisateur</h3>

        <a href="{{ route('admin.user.index') }}" class="btn-custom success">
            Accueil
        </a>

        <table class="user-table">
            <tbody>
                <tr>
                    <th>Nom</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Email vérifié le</th>
                    <td>{{ $user->email_verified_at }}</td>
                </tr>
                <tr>
                    <th>Mot de passe (hashé)</th>
                    <td>{{ $user->password }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="btn-custom primary">
            <i class="fa-solid fa-pen-to-square"></i> Modifier
        </a>
    </div>
@endsection
