    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    <div class="row">
        <div class="col-md-8">
            <form
                action="{{ isset($title) ? route('admin.title.update', ['title' => $title->id]) : route('admin.title.store') }}"
                method="POST">
                @csrf
                @if (isset($title))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="title1" class="form-label">Titre 1</label>
                    <input type="text" placeholder="Creez votre titre" name="title1"
                        value="{{ old('title1', isset($title) ? $title->title1 : '') }}" class="form-control"
                        id="title1" aria-describedby="title1Help" required />

                    @error('title1')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title2" class="form-label">Titre 2</label>
                    <input type="text" placeholder="Creez votre titre" name="title2"
                        value="{{ old('title2', isset($title) ? $title->title2 : '') }}" class="form-control"
                        id="title2" aria-describedby="title2Help" required />

                    @error('title2')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title3" class="form-label">Titre 3</label>
                    <input type="text" placeholder="Creez votre titre" name="title3"
                        value="{{ old('title3', isset($title) ? $title->title3 : '') }}" class="form-control"
                        id="title3" aria-describedby="title3Help" required />

                    @error('title3')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title4" class="form-label">Titre 4</label>
                    <input type="text" placeholder="Creez votre titre" name="title4"
                        value="{{ old('title4', isset($title) ? $title->title4 : '') }}" class="form-control"
                        id="title4" aria-describedby="title4Help" required />

                    @error('title4')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title5" class="form-label">Titre 5</label>
                    <input type="text" placeholder="Creez votre titre" name="title5"
                        value="{{ old('title5', isset($title) ? $title->title5 : '') }}" class="form-control"
                        id="title5" aria-describedby="title5Help" required />

                    @error('title5')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title6" class="form-label">Titre 6</label>
                    <input type="text" placeholder="Creez votre titre" name="title6"
                        value="{{ old('title6', isset($title) ? $title->title6 : '') }}" class="form-control"
                        id="title6" aria-describedby="title6Help" required />

                    @error('title6')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div> <a href="{{ route('admin.title.index') }}" class="btn btn-danger mt-1">
                    Annuler
                </a>
                <button class="btn btn-primary mt-1"> {{ isset($title) ? 'Modifier' : 'Creer' }}</button>
            </form>
        </div>
        {{-- <div class="col-md-4">
            <a class="btn btn-danger mt-1" href="{{ route('admin.title.index') }}">
                Annuler
            </a>
            <button class="btn btn-primary mt-1"> {{ isset($title) ? 'Modifier' : 'Creer' }}</button>
        </div> --}}
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
