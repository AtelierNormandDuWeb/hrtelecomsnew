@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

<div class="row">
    <div class="col-md-8">
        <form
            action="{{ isset($cards) ? route('admin.cards.update', ['cards' => $cards->id]) : route('admin.cards.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($cards))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                <input type="text" placeholder="Name ..." name="name"
                    value="{{ old('name', isset($cards) ? $cards->name : '') }}" class="form-control" id="name"
                    aria-describedby="nameHelp" required />

                @error('name')
                    <div class="error text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" placeholder="Title ..." name="title"
                    value="{{ old('title', isset($cards) ? $cards->title : '') }}" class="form-control" id="title"
                    aria-describedby="titleHelp" />

                @error('title')
                    <div class="error text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="subtitle" class="form-label">Rôle</label>
                <input type="text" placeholder="Subtitle ..." name="subtitle"
                    value="{{ old('subtitle', isset($cards) ? $cards->subtitle : '') }}" class="form-control"
                    id="subtitle" aria-describedby="subtitleHelp" />

                @error('subtitle')
                    <div class="error text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Avatar</label>
                <button type="button" class="btn btn-success btn-lg" onclick="triggerFileInput('avatar_url')">
                    Ajouter image : (avatar_url)
                </button>
                <input type="file" name="avatar_url" accept="image/*"
                    class="visually-hidden form-control imageUpload" id="avatar_url"
                    aria-describedby="avatar_urlHelp" />

                <div class="form-group d-flex" id="preview_avatar_url" style="max-width: 100%;">
                    @if (isset($cards) && $cards->avatar_url)
                        <img src="{{ Str::startsWith($cards->avatar_url, 'http') ? $cards->avatar_url : Storage::url($cards->avatar_url) }}"
                            alt="Current avatar" style="max-width: 100px; display: block;">
                    @endif
                </div>
                @error('avatar_url')
                    <div class="error text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Background</label>
                <button type="button" class="btn btn-success btn-lg"
                    onclick="triggerFileInput('background_url')">
                    Ajouter image : (background_url)
                </button>
                <input type="file" name="background_url" accept="image/*"
                    class="visually-hidden form-control imageUpload" id="background_url"
                    aria-describedby="background_urlHelp" />

                <div class="form-group d-flex" id="preview_background_url" style="max-width: 100%;">
                    @if (isset($cards) && $cards->background_url)
                        <img src="{{ Str::startsWith($cards->background_url, 'http') ? $cards->background_url : Storage::url($cards->background_url) }}"
                            alt="Current background" style="max-width: 100px; display: block;">
                    @endif
                </div>
                @error('background_url')
                    <div class="error text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea placeholder="Description ..." name="description" class="form-control" id="description"
                    aria-describedby="descriptionHelp" rows="3" required>{{ old('description', isset($cards) ? $cards->description : '') }}</textarea>

                @error('description')
                    <div class="error text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea placeholder="Details ..." name="details" class="form-control" id="details" aria-describedby="detailsHelp"
                    rows="3">{{ old('details', isset($cards) ? $cards->details : '') }}</textarea>

                @error('details')
                    <div class="error text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contact_info" class="form-label">Email et/ou téléphone</label>
                <textarea placeholder="Contact info ..." name="contact_info" class="form-control" id="contact_info"
                    aria-describedby="contact_infoHelp" rows="3">{{ old('contact_info', isset($cards) ? $cards->contact_info : '') }}</textarea>

                @error('contact_info')
                    <div class="error text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sort_order" class="form-label">Ordre d'affichage</label>
                <input type="number" placeholder="Sort order ..." name="sort_order" min="0"
                    value="{{ old('sort_order', isset($cards) ? $cards->sort_order : '0') }}" class="form-control"
                    id="sort_order" aria-describedby="sort_orderHelp" />

                @error('sort_order')
                    <div class="error text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('admin.cards.index') }}" class="btn btn-danger btn-lg mt-1">
                    Annuler
                    <i class="fa-solid fa-trash"></i>
                </a>
                <button class="btn btn-primary btn-lg mt-1"> {{ isset($cards) ? 'Modifier' : 'Creer' }}<i
                        class="fa-solid fa-pen-to-square"></i></button>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Instructions</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><span class="text-danger">*</span> Champs obligatoires</li>
                    <li>Images acceptées: JPG, PNG, GIF</li>
                    <li>Taille max: 2MB par image</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // Initialisation Select2
        $(document).ready(function() {
            $('select').select2();
        });

        // Fonction pour déclencher l'input file
        function triggerFileInput(fieldId) {
            const fileInput = document.getElementById(fieldId);
            if (fileInput) {
                fileInput.click();
            }
        }

        // Gestion de la prévisualisation des images
        const imageUploads = document.querySelectorAll('.imageUpload');
        imageUploads.forEach(function(imageUpload) {
            imageUpload.addEventListener('change', function(event) {
                const files = this.files;

                if (files && files.length > 0) {
                    const previewContainer = document.getElementById('preview_' + this.id);
                    previewContainer.innerHTML = ''; // Effacer le contenu précédent

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        if (file && file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            const img = document.createElement('img');

                            reader.onload = function(event) {
                                img.src = event.target.result;
                                img.alt = "Prévisualisation de l'image";
                                img.style.maxWidth = '100px';
                                img.style.display = 'block';
                                img.style.marginTop = '10px';
                                img.classList.add('img-thumbnail');
                            }

                            reader.readAsDataURL(file);
                            previewContainer.appendChild(img);
                        }
                    }
                }
            });
        });

        // Debug du formulaire
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = document.querySelector('button[type="submit"]');

            console.log('Form found:', form);
            console.log('Submit button found:', submitBtn);
            console.log('Form action:', form ? form.action : 'No form');
            console.log('Form method:', form ? form.method : 'No form');

            if (form) {
                form.addEventListener('submit', function(e) {
                    console.log('Form submitted');

                    // Vérification des champs obligatoires
                    const name = document.getElementById('name').value.trim();
                    const description = document.getElementById('description').value.trim();

                    console.log('Name:', name);
                    console.log('Description:', description);

                    if (!name) {
                        e.preventDefault();
                        alert('Le nom est obligatoire.');
                        return false;
                    }

                    if (!description) {
                        e.preventDefault();
                        alert('La description est obligatoire.');
                        return false;
                    }

                    console.log('Form validation passed');
                });
            }
        });
    </script>
@endsection
