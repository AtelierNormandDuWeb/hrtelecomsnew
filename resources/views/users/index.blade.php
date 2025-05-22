@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .admin-users-container {
            max-width: 1200px;
            margin: 1em auto;
            padding: 1em;
            background-color: #fff;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h3 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1.5rem;
        }

        .actions-bar {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .btn-custom {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-success {
            background-color: var(--golden-1, #3f72af);
            color: #fff;
        }

        .btn-success:hover {
            background-color: #3f72af;
        }

        .btn-secondary {
            background-color: #555;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #444;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .user-table th,
        .user-table td {
            border: 1px solid #ccc;
            padding: 1rem;
            text-align: left;
        }

        .user-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .user-table td {
            background-color: #fff;
        }

        .action-buttons a {
            margin-right: 0.5rem;
            font-size: 1.2rem;
            color: #333;
            transition: color 0.3s;
        }

        .action-buttons a:hover {
            color: var(--golden-1, #3f72af);
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .actions-bar {
                flex-direction: column;
                align-items: stretch;
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
    <div class="admin-users-container">
        <h3>Détails utilisateur</h3>
        <div class="d-flex justify-content-start">
            <div class="actions-bar">
                <a href="{{ route('admin.user.create') }}" class="btn-custom btn-success">
                    Créer utilisateur
                </a>
            </div>
        </div>
        <table class="user-table">
            @foreach ($users as $user)
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
                    {{-- <tr>
                        <th>Mot de passe (hashé)</th>
                        <td>{{ $user->password }}</td>
                    </tr> --}}
                    <tr>
                        <td class="action-buttons">
                            <a href="{{ route('admin.user.show', ['id' => $user->id]) }}"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a href="#" data-id="{{ $user->id }}" class="deleteBtn"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{-- <table id="User" class="user-table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Email vérifié le</th>
                 <th>Mot de passe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at }}</td>
                    <td>{{ $user->password }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.user.show', ['id' => $user->id]) }}"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" data-id="{{ $user->id }}" class="deleteBtn"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

        <div class="pagination">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div id="confirmModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Confirmer suppression</h3>
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-custom btn-secondary">Annuler</button>
                    <button type="button" class="btn-custom btn-success confirmDeleteAction">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
