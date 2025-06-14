@extends('admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div>
        <h3 class="text-center">L'équipe</h3>
        <a href="{{ route('admin.cards.create') }}" class="btn btn-warning btn-lg mb-3">
            <i class="fa-solid fa-plus"></i>Nouveau
        </a>
        @foreach ($cards as $card)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>N#</th>
                            <td>{{ $card->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $card->name }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $card->title }}</td>
                        </tr>
                        <tr>
                            <th>Subtitle</th>
                            <td>{{ $card->subtitle }}</td>
                        </tr>
                        <tr>
                            <th>Avatar</th>
                            <td>
                                <div class="form-group d-flex" id="preview_imageUrl" style="max-width: 100%;">
                                    <img src="{{ Str::startsWith($card->avatar_url, 'http') ? $card->avatar_url : asset('images/' . $card->avatar_url) }}"
                                        alt="Prévisualisation de l'avatar" style="max-width: 100px; display: block;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Background</th>
                            <td>
                                <div class="form-group d-flex" id="preview_imageUrl" style="max-width: 100%;">
                                    <img src="{{ Str::startsWith($card->background_url, 'http') ? $card->background_url : asset('images/' . $card->background_url) }}"
                                        alt="Prévisualisation du background" style="max-width: 100px; display: block;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $card->description }}</td>
                        </tr>
                        <tr>
                            <th>Details</th>
                            <td>{{ $card->details }}</td>
                        </tr>
                        <tr>
                            <th>Contact Info</th>
                            <td>{{ $card->contact_info }}</td>
                        </tr>
                        <tr>
                            <th>Sort Order</th>
                            <td>{{ $card->sort_order }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <div class="btn-group gap-2" role="group" aria-label="Actions CRUD">
                                    <a href="{{ route('admin.cards.show', ['id' => $card->id]) }}"
                                        class="btn btn-primary btn-lg">Voir
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.cards.edit', ['id' => $card->id]) }}"
                                        class="btn btn-success btn-lg">Modifier
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" data-id="{{ $card->id }}"
                                        class="btn btn-danger btn-lg deleteBtn">Supprimer
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="confirmModalLabel">Confirmer suppression</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary confirmDeleteAction">Supprimer</button>
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
                const response = await fetch('/admin/cards/speed/' + id, {
                    method: 'PUT',
                    body: JSON.stringify(
                        data), // Utilisation de JSON.stringify au lieu de JSON.stringfy
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
                    const response = await fetch('/admin/cards/delete/' + id, {
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
        document.addEventListener('DOMContentLoaded', function() {
            const tableHeaders = document.querySelectorAll('#Cards th');
            const columnSelector = document.getElementById('columnSelector');

            tableHeaders.forEach(function(header, index) {
                const li = document.createElement('li');
                const a = document.createElement('a');
                const div = document.createElement('div');
                a.className = 'dropdown-item';
                div.className = 'form-check form-switch';
                const label = document.createElement('label');
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.role = "switch"
                checkbox.className = 'columnSelector form-check-input';
                checkbox.dataset.column = index;
                const savedSelection = localStorage.getItem('selectedColumns#Cards');
                checkbox.checked = !!!savedSelection; // Sélectionner par défaut
                checkbox.addEventListener('change', function() {
                    const columnIndex = parseInt(checkbox.dataset.column);
                    toggleColumn(columnIndex, checkbox.checked);
                    saveSelection();
                });

                label.appendChild(document.createTextNode(header.textContent));
                div.appendChild(label)
                div.appendChild(checkbox)
                a.appendChild(div);
                li.appendChild(a);
                columnSelector.appendChild(li);

                header.addEventListener('click', function() {
                    sortTable(index);
                });

                if (savedSelection) {
                    const selectedColumns = JSON.parse(savedSelection);
                    toggleColumn(parseInt(index), selectedColumns.includes(index));
                }
            });


            const checkboxes = document.querySelectorAll('.columnSelector');

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    const columnIndex = parseInt(checkbox.dataset.column);
                    toggleColumn(columnIndex, checkbox.checked);

                    // Sauvegarde la sélection dans le localStorage
                    saveSelection();
                });
            });

            // Chargement des valeurs sauvegardées dans le localStorage
            loadSavedSelection();
        });

        function toggleColumn(columnIndex, show) {
            const dataTable = document.getElementById('Cards');
            const cells = dataTable.querySelectorAll(
                `tr td:nth-child(${columnIndex + 1}), th:nth-child(${columnIndex + 1})`);

            cells.forEach(function(cell) {
                if (show) {
                    cell.style.display = ''; // Affiche la colonne
                } else {
                    cell.style.display = 'none'; // Masque la colonne
                }
            });
        }

        function saveSelection() {
            const selectedColumns = Array.from(document.querySelectorAll('.columnSelector'))
                .filter(c => c.checked)
                .map(c => c.dataset.column);
            localStorage.setItem('selectedColumns#Cards', JSON.stringify(selectedColumns));
        }

        function loadSavedSelection() {
            const savedSelection = localStorage.getItem('selectedColumns#Cards');
            if (savedSelection) {
                const selectedColumns = JSON.parse(savedSelection);
                selectedColumns.forEach(function(columnIndex) {
                    const checkbox = document.querySelector(`.columnSelector[data-column="${columnIndex}"]`);
                    if (checkbox) {
                        checkbox.checked = true;
                        toggleColumn(parseInt(columnIndex), true);
                    }
                });
            }
        }

        function sortTable(columnIndex) {
            const table = document.getElementById('Cards');
            const rows = Array.from(table.querySelectorAll('tbody tr'));

            console.log({
                rows
            });

            rows.sort((a, b) => {
                const cellA = a.querySelectorAll('td')[columnIndex].textContent;
                const cellB = b.querySelectorAll('td')[columnIndex].textContent;

                return cellA.localeCompare(cellB, undefined, {
                    numeric: true,
                    sensitivity: 'base'
                });
            });

            table.querySelector('tbody').innerHTML = '';
            rows.forEach(row => table.querySelector('tbody').appendChild(row));
        }
    </script>
@endsection
