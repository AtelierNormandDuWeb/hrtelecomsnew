    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    <div class="row">
        <div class="col-md-8">
            <form
                action="{{ isset($solution) ? route('admin.solution.update', ['solution' => $solution->id]) : route('admin.solution.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($solution))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="button1" class="form-label">Boutton 1</label>
                    <input type="text" placeholder="Button1 ..." name="button1"
                        value="{{ old('button1', isset($solution) ? $solution->button1 : '') }}" class="form-control"
                        id="button1" aria-describedby="button1Help" required />

                    @error('button1')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="button2" class="form-label">Boutton 2</label>
                    <input type="text" placeholder="Button2 ..." name="button2"
                        value="{{ old('button2', isset($solution) ? $solution->button2 : '') }}" class="form-control"
                        id="button2" aria-describedby="button2Help" required />

                    @error('button2')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" placeholder="Title ..." name="title"
                        value="{{ old('title', isset($solution) ? $solution->title : '') }}" class="form-control"
                        id="title" aria-describedby="titleHelp" required />

                    @error('title')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" placeholder="Description ..." name="description"
                        value="{{ old('description', isset($solution) ? $solution->description : '') }}"
                        class="form-control" id="description" aria-describedby="descriptionHelp" required />

                    @error('description')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="liste1" class="form-label">Liste 1</label>
                    <input type="text" placeholder="Liste1 ..." name="liste1"
                        value="{{ old('liste1', isset($solution) ? $solution->liste1 : '') }}" class="form-control"
                        id="liste1" aria-describedby="liste1Help" required />

                    @error('liste1')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="liste2" class="form-label">Liste 2</label>
                    <input type="text" placeholder="Liste2 ..." name="liste2"
                        value="{{ old('liste2', isset($solution) ? $solution->liste2 : '') }}" class="form-control"
                        id="liste2" aria-describedby="liste2Help" required />

                    @error('liste2')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="liste3" class="form-label">Liste 3</label>
                    <input type="text" placeholder="Liste3 ..." name="liste3"
                        value="{{ old('liste3', isset($solution) ? $solution->liste3 : '') }}" class="form-control"
                        id="liste3" aria-describedby="liste3Help" required />

                    @error('liste3')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="liste4" class="form-label">Liste 4</label>
                    <input type="text" placeholder="Liste4 ..." name="liste4"
                        value="{{ old('liste4', isset($solution) ? $solution->liste4 : '') }}" class="form-control"
                        id="liste4" aria-describedby="liste4Help" required />

                    @error('liste4')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="liste5" class="form-label">Liste 5</label>
                    <input type="text" placeholder="Liste5 ..." name="liste5"
                        value="{{ old('liste5', isset($solution) ? $solution->liste5 : '') }}" class="form-control"
                        id="liste5" aria-describedby="liste5Help" required />

                    @error('liste5')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-success btn-file my-1"
                        onclick="triggerFileInput('imageUrl')">
                        Ajouter fichier : (ImageUrl)
                    </button>
                    <input type="file" name="imageUrl"
                        value="{{ old('imageUrl', isset($solution) ? $solution->imageUrl : '') }}"
                        class="visually-hidden form-control imageUpload" id="imageUrl"
                        aria-describedby="imageUrlHelp" />

                    <div class="form-group d-flex" id="preview_imageUrl" style="max-width: 100%;">
                    </div>
                    @error('imageUrl')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div> <a href="{{ route('admin.solution.index') }}" class="btn btn-danger mt-1">
                    Annuler
                </a>
                <button class="btn btn-primary mt-1"> {{ isset($solution) ? 'Modifier' : 'Creer' }}</button>
            </form>
        </div>
    </div>

    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

        <script>
            const textareas = document.querySelectorAll('textarea');
            textareas.forEach((textarea) => {
                ClassicEditor
                    .create(textarea)
                    .catch(error => {
                        console.error(error);
                    });
            });

            $(document).ready(function() {
                $('select').select2();
            });

            function triggerFileInput(fieldId) {
                const fileInput = document.getElementById(fieldId);
                if (fileInput) {
                    fileInput.click();
                }
            }

            const imageUploads = document.querySelectorAll('.imageUpload');
            imageUploads.forEach(function(imageUpload) {
                imageUpload.addEventListener('change', function(event) {
                    event.preventDefault()
                    const files = this.files; // Récupérer tous les fichiers sélectionnés
                    console.log(files)
                    if (files && files.length > 0) {
                        const previewContainer = document.getElementById('preview_' + this.id);
                        previewContainer.innerHTML = ''; // Effacer le contenu précédent

                        for (let i = 0; i < files.length; i++) {
                            const file = files[i];
                            if (file) {
                                const reader = new FileReader();
                                const img = document.createElement(
                                'img'); // Créer un élément img pour chaque image

                                reader.onload = function(event) {
                                    img.src = event.target.result;
                                    img.alt = "Prévisualisation de l'image"
                                    img.style.maxWidth = '100px';
                                    img.style.display = 'block';
                                }

                                reader.readAsDataURL(file);
                                previewContainer.appendChild(img); // Ajouter l'image à la prévisualisation
                                console.log({
                                    img
                                })
                                console.log({
                                    previewContainer
                                })
                            }
                        }
                        console.log({
                            previewContainer
                        })
                    }
                });
            });
        </script>
    @endsection
