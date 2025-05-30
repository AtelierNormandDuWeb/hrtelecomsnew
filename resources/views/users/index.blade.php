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
        <h3 class="text-center"> Utilisateurs</h3>
        <a href="{{ route('admin.user.create') }}" class="btn btn-warning btn-lg mb-3">
            <i class="fa-solid fa-plus"></i>Créer utilisateur
        </a>
        <table class="user-table table-responsive">
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
                        <td colspan="2" class="text-center">
                            <div class="btn-group gap-2" role="group" aria-label="Actions CRUD">
                                <a href="{{ route('admin.user.show', ['id' => $user->id]) }}"
                                    class="btn btn-primary btn-lg">Voir
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"
                                    class="btn btn-success btn-lg">Modifier
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                {{-- <a href="#" data-id="{{ $user->id }}"
                                    class="btn btn-danger btn-lg deleteBtn">Supprimer
                                    <i class="fa-solid fa-trash"></i>
                                </a> --}}
                            </div>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
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
  <script>
        const checkboxs = document.querySelectorAll('input[type="checkbox"]')

        checkboxs.forEach((checkbox) => {

            checkbox.onchange = async (event) => {
                const {
                    checked,
                    name,
                    dataset
                } = event.target;
                const {
                    id
                } = dataset;
                console.log({
                    checked,
                    name,
                    id
                });
                const data = {
                    [name]: checked.toString()
                };
                const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                const response = await fetch('/admin/user/speed/' + id, {
                    method: 'PUT',
                    body: JSON.stringify(
                        data),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
            };
        })

        const deleteButtons = document.querySelectorAll('.deleteBtn')
        deleteButtons.forEach(deleteButton => {
            deleteButton.addEventListener('click', (event) => {
                event.preventDefault();
                const {
                    id,
                    title
                } = deleteButton.dataset
                const modalBody = document.querySelector('.modal-body')
                modalBody.innerHTML = `Êtes-vous sûr de vouloir supprimer ces données ?</strong> `
                console.log({
                    id,
                    title
                });
                const modal = new bootstrap.Modal(document.querySelector('#confirmModal'))
                modal.show()
                const confirmDeleteBtn = document.querySelector('.confirmDeleteAction')

                confirmDeleteBtn.addEventListener('click', async () => {
                    const csrfToken = document.head.querySelector('meta[name="csrf-token"]')
                        .content;
                    const response = await fetch('/admin/user/delete/' + id, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })

                    const result = await response.json()

                    if (result && result.isSuccess) {
                        window.location.href = window.location.href;
                    }


                    modal.hide()
                })
            })

        });
    </script>
@endsection
