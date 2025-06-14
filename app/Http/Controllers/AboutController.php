<?php
namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
// CHANGEMENT 1 : Suppression de AboutFormRequest import
// use App\Http\Requests\AboutFormRequest; → SUPPRIMÉ
// CHANGEMENT 2 : Ajout de File au lieu de Storage
use Illuminate\Support\Facades\File; // NOUVEAU : File au lieu de Storage

class AboutController extends Controller
{
    public function index(): View
    {
        $abouts = About::orderBy('created_at', 'desc')->paginate(5);
        return view('abouts/index',
        [
            'abouts' => $abouts
        ]);
    }

    public function show($id): View
    {
        $about = About::findOrFail($id);
        return view('abouts/show',['about' => $about]);
    }

    public function create(): View
    {
        return view('abouts/create');
    }

    public function edit($id): View
    {
        $about = About::findOrFail($id);
        return view('abouts/edit', ['about' => $about]);
    }

    // CHANGEMENT 3 : Request au lieu de AboutFormRequest + validation manuelle
    public function store(Request $req): RedirectResponse // AVANT: aboutFormRequest $req
    {
        // CHANGEMENT 4 : Validation manuelle au lieu de $req->validated()
        $data = $req->validate([
            'title1' => 'required|string|max:255',
            'title2' => 'required|string|max:255', 
            'texte1' => 'required|string',
            'texte2' => 'required|string',
            'button' => 'required|string|max:255',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($req->hasFile('imageUrl')) {
            $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
        }
        $about = About::create($data);
        return redirect()->route('admin.about.show', ['id' => $about->id]);
    }

    // CHANGEMENT 5 : Request au lieu de AboutFormRequest + validation manuelle
    public function update(About $about, Request $req) // AVANT: AboutFormRequest $req
    {
        // CHANGEMENT 6 : Validation manuelle au lieu de $req->validated()
        $data = $req->validate([
            'title1' => 'required|string|max:255',
            'title2' => 'required|string|max:255',
            'texte1' => 'required|string', 
            'texte2' => 'required|string',
            'button' => 'required|string|max:255',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($req->hasFile('imageUrl')) {
            // CHANGEMENT 7 : File::delete au lieu de Storage::disk('public')->delete
            if ($about->imageUrl) {
                $oldImagePath = public_path('images/' . $about->imageUrl); // NOUVEAU chemin
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath); // NOUVEAU : File au lieu de Storage
                }
            }
            $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
        }
        $about->update($data);
        return redirect()->route('admin.about.show', ['id' => $about->id]);
    }

    public function updateSpeed(About $about, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $about->update([
                $key => $value
            ]);
        }
        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(About $about)
    {
        // CHANGEMENT 8 : File::delete au lieu de Storage::disk('public')->delete
        if ($about->imageUrl) {
            $imagePath = public_path('images/' . $about->imageUrl); // NOUVEAU chemin
            if (File::exists($imagePath)) {
                File::delete($imagePath); // NOUVEAU : File au lieu de Storage
            }
        }
        $about->delete();
        return [
            'isSuccess' => true
        ];
    }

    private function handleImageUpload(\Illuminate\Http\UploadedFile|array $images): string|array
    {
        // CHANGEMENT 9 : Création automatique du dossier public/images
        if (!File::exists(public_path('images'))) {
            File::makeDirectory(public_path('images'), 0755, true);
        }

        if (is_array($images)) {
            $uploadedImages = [];
            foreach ($images as $image) {
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                // CHANGEMENT 10 : move() vers public/images au lieu de storeAs()
                $image->move(public_path('images'), $imageName); // AVANT: storeAs('images', $imageName, 'public')
                // CHANGEMENT 11 : Retour du nom seulement, pas du chemin
                $uploadedImages[] = $imageName; // AVANT: 'images/' . $imageName
            }
            return $uploadedImages;
        } else {
            $imageName = uniqid() . '_' . $images->getClientOriginalName();
            // CHANGEMENT 12 : move() vers public/images au lieu de storeAs()
            $images->move(public_path('images'), $imageName); // AVANT: storeAs('images', $imageName, 'public')
            // CHANGEMENT 13 : Retour du nom seulement, pas du chemin
            return $imageName; // AVANT: 'images/' . $imageName
        }
    }
}