    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    <div class="row">
        <div class="col-md-8">
            <form
                action="{{ isset($about) ? route('admin.about.update', ['about' => $about->id]) : route('admin.about.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($about))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="title1" class="form-label">Titre 1</label>
                    <input type="text" placeholder="Title1 ..." name="title1"
                        value="{{ old('title1', isset($about) ? $about->title1 : '') }}" class="form-control"
                        id="title1" aria-describedby="title1Help" required />

                    @error('title1')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title2" class="form-label">Titre 2</label>
                    <input type="text" placeholder="Title2 ..." name="title2"
                        value="{{ old('title2', isset($about) ? $about->title2 : '') }}" class="form-control"
                        id="title2" aria-describedby="title2Help" required />

                    @error('title2')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="texte1" class="form-label">Texte 1</label>
                    <input type="text" placeholder="Texte1 ..." name="texte1"
                        value="{{ old('texte1', isset($about) ? $about->texte1 : '') }}" class="form-control"
                        id="texte1" aria-describedby="texte1Help" required />

                    @error('texte1')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="texte2" class="form-label">Texte 2</label>
                    <input type="text" placeholder="Texte2 ..." name="texte2"
                        value="{{ old('texte2', isset($about) ? $about->texte2 : '') }}" class="form-control"
                        id="texte2" aria-describedby="texte2Help" required />

                    @error('texte2')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="button" class="form-label">Boutton</label>
                    <input type="text" placeholder="Button ..." name="button"
                        value="{{ old('button', isset($about) ? $about->button : '') }}" class="form-control"
                        id="button" aria-describedby="buttonHelp" required />

                    @error('button')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-success btn-file my-1" onclick="triggerFileInput('imageUrl')">
                        Ajouter image : (ImageUrl)
                    </button>
                    <input type="file" name="imageUrl"
                        value="{{ old('imageUrl', isset($about) ? $about->imageUrl : '') }}"
                        class="visually-hidden form-control imageUpload" id="imageUrl"
                        aria-describedby="imageUrlHelp" />

                    <div class="form-group d-flex" id="preview_imageUrl" style="max-width: 100%;">
                    </div>
                    @error('imageUrl')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div> <a href="{{ route('admin.about.index') }}" class="btn btn-danger mt-1">
                    Annuler
                </a>
                <button class="btn btn-primary mt-1"> {{ isset($about) ? 'Modifier' : 'Creer' }}</button>
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
