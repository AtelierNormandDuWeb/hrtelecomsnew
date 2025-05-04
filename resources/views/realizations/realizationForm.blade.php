    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    <div class="row">
        <div class="col-md-8">
            <form
                action="{{ isset($realization) ? route('admin.realization.update', ['realization' => $realization->id]) : route('admin.realization.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($realization))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Nom du chantier</label>
                    <input type="text" placeholder="Name ..." name="name"
                        value="{{ old('name', isset($realization) ? $realization->name : '') }}" class="form-control"
                        id="name" aria-describedby="nameHelp" required />

                    @error('name')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" placeholder="Description ..." name="description"
                        value="{{ old('description', isset($realization) ? $realization->description : '') }}"
                        class="form-control" id="description" aria-describedby="descriptionHelp" required />

                    @error('description')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="categories" class="form-label">Categories</label>
                
                    <!-- Ajoute l'attribut multiple pour une sélection multiple -->
                    <select class="form-control" name="categories[]" id="categories" multiple>
                        <option value="">Veuillez sélectionner les catégories de réalisation</option>
                
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if(in_array($category->id, old('categories', isset($realization) ? $realization->categories->pluck('id')->toArray() : []))) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                
                    <!-- Contrôle des erreurs sur le champ categories -->
                    @error('categories')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                


                <div class="mb-3">
                    <label for="moreDescription" class="form-label">Plus de Détails</label>
                    <textarea name="moreDescription" class="form-control" id="moreDescription" aria-describedby="moreDescriptionHelp">{{ old('moreDescription', isset($realization) ? $realization->moreDescription : '') }}</textarea>

                    @error('moreDescription')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="additionalInfos" class="form-label">Lieu de la réalisation</label>
                    <textarea name="additionalInfos" class="form-control" id="additionalInfos" aria-describedby="additionalInfosHelp">{{ old('additionalInfos', isset($realization) ? $realization->additionalInfos : '') }}</textarea>

                    @error('additionalInfos')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-success btn-file my-1"
                        onclick="triggerFileInput('imageUrls')">
                        Ajouter image : (ImageUrls)
                    </button>
                    <input type="file" name="imageUrls[]" class="form-control imageUpload visually-hidden"
                        id="imageUrls" aria-describedby="imageUrlsHelp" multiple />
                    <div class="form-group  hstack gap-3" id="preview_imageUrls" style="max-width: 100%;"></div>
                    @error('imageUrls')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div> <a href="{{ route('admin.realization.index') }}" class="btn btn-danger mt-1">
                    Annuler
                </a>
                <button class="btn btn-primary mt-1"> {{ isset($realization) ? 'Modifier' : 'Creer' }}</button>
            </form>
        </div>
        {{-- <div class="col-md-4">
            <a class="btn btn-danger mt-1" href="{{ route('admin.realization.index') }}">
                Annuler
            </a>
            <button class="btn btn-primary mt-1"> {{ isset($realization) ? 'Modifier' : 'Creer' }}</button>
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
