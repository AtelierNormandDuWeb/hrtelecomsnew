    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    <div class="row">
        <div class="col-md-8">
            <form
                action="{{ isset($info) ? route('admin.info.update', ['info' => $info->id]) : route('admin.info.store') }}"
                method="POST">
                @csrf
                @if (isset($info))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" placeholder="Adresse ..." name="adresse"
                        value="{{ old('adresse', isset($info) ? $info->adresse : '') }}" class="form-control"
                        id="adresse" aria-describedby="adresseHelp" required />

                    @error('adresse')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="codepostal" class="form-label">Codepostal</label>
                    <input type="text" placeholder="Codepostal ..." name="codepostal"
                        value="{{ old('codepostal', isset($info) ? $info->codepostal : '') }}" class="form-control"
                        id="codepostal" aria-describedby="codepostalHelp" required />

                    @error('codepostal')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" placeholder="Ville ..." name="ville"
                        value="{{ old('ville', isset($info) ? $info->ville : '') }}" class="form-control" id="ville"
                        aria-describedby="villeHelp" required />

                    @error('ville')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pays" class="form-label">Pays</label>
                    <input type="text" placeholder="Pays ..." name="pays"
                        value="{{ old('pays', isset($info) ? $info->pays : '') }}" class="form-control" id="pays"
                        aria-describedby="paysHelp" required />

                    @error('pays')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="text" placeholder="Telephone ..." name="telephone"
                        value="{{ old('telephone', isset($info) ? $info->telephone : '') }}" class="form-control"
                        id="telephone" aria-describedby="telephoneHelp" required />

                    @error('telephone')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" placeholder="Email ..." name="email"
                        value="{{ old('email', isset($info) ? $info->email : '') }}" class="form-control"
                        id="email" aria-describedby="emailHelp" required />

                    @error('email')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="lundi" class="form-label">Lundi</label>
                    <input type="text" placeholder="Lundi ..." name="lundi"
                        value="{{ old('lundi', isset($info) ? $info->lundi : '') }}" class="form-control"
                        id="lundi" aria-describedby="lundiHelp" required />

                    @error('lundi')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="mardi" class="form-label">Mardi</label>
                    <input type="text" placeholder="Mardi ..." name="mardi"
                        value="{{ old('mardi', isset($info) ? $info->mardi : '') }}" class="form-control"
                        id="mardi" aria-describedby="mardiHelp" required />

                    @error('mardi')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="mercredi" class="form-label">Mercredi</label>
                    <input type="text" placeholder="Mercredi ..." name="mercredi"
                        value="{{ old('mercredi', isset($info) ? $info->mercredi : '') }}" class="form-control"
                        id="mercredi" aria-describedby="mercrediHelp" required />

                    @error('mercredi')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jeudi" class="form-label">Jeudi</label>
                    <input type="text" placeholder="Jeudi ..." name="jeudi"
                        value="{{ old('jeudi', isset($info) ? $info->jeudi : '') }}" class="form-control"
                        id="jeudi" aria-describedby="jeudiHelp" required />

                    @error('jeudi')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="vendredi" class="form-label">Vendredi</label>
                    <input type="text" placeholder="Vendredi ..." name="vendredi"
                        value="{{ old('vendredi', isset($info) ? $info->vendredi : '') }}" class="form-control"
                        id="vendredi" aria-describedby="vendrediHelp" required />

                    @error('vendredi')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="samedi" class="form-label">Samedi</label>
                    <input type="text" placeholder="Samedi ..." name="samedi"
                        value="{{ old('samedi', isset($info) ? $info->samedi : '') }}" class="form-control"
                        id="samedi" aria-describedby="samediHelp" required />

                    @error('samedi')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="dimanche" class="form-label">Dimanche</label>
                    <input type="text" placeholder="Dimanche ..." name="dimanche"
                        value="{{ old('dimanche', isset($info) ? $info->dimanche : '') }}" class="form-control"
                        id="dimanche" aria-describedby="dimancheHelp" required />

                    @error('dimanche')
                        <div class="error text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <a href="{{ route('admin.info.index') }}" class="btn btn-danger btn-lg mt-1">
                    Annuler
                    <i class="fa-solid fa-trash"></i>
                </a>
                <button class="btn btn-primary btn-lg mt-1"> {{ isset($info) ? 'Modifier' : 'Creer' }}<i
                        class="fa-solid fa-pen-to-square"></i></button>
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
