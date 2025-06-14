<?php
namespace App\Http\Controllers;
use App\Models\Cards;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;

class CardsController extends Controller
{
    public function index(): View
    {
        $cards = Cards::orderBy('created_at', 'desc')->paginate(10);
        return view('cards/index', ['cards' => $cards]);
    }

    public function show($id): View
    {
        $cards = Cards::findOrFail($id);
        return view('cards/show', ['cards' => $cards]);
    }

    public function create(): View
    {
        return view('cards/create');
    }

    public function edit($id): View
    {
        $cards = Cards::findOrFail($id);
        return view('cards/edit', ['cards' => $cards]);
    }

    public function store(Request $req): RedirectResponse
    {
        // CORRECTION 1 : Validation manuelle au lieu de validated()
        $data = $req->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'avatar_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'background_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // Ajoutez ici les autres champs selon votre modèle Cards
        ]);
       
        if ($req->hasFile('avatar_url')) {
            $data['avatar_url'] = $this->handleImageUpload($req->file('avatar_url'));
        }
       
        if ($req->hasFile('background_url')) {
            $data['background_url'] = $this->handleImageUpload($req->file('background_url'));
        }
        
        $cards = Cards::create($data);
        return redirect()->route('admin.cards.show', ['id' => $cards->id]);
    }

    public function update(Cards $cards, Request $req)
    {
        // CORRECTION 2 : Validation manuelle au lieu de validated()
        $data = $req->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'avatar_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'background_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // Ajoutez ici les autres champs selon votre modèle Cards
        ]);
       
        // CORRECTION 3 : File::delete au lieu de Storage::disk('public')->delete
        // Gestion de l'avatar
        if ($req->hasFile('avatar_url')) {
            if ($cards->avatar_url) {
                $oldAvatarPath = public_path('images/' . $cards->avatar_url);
                if (File::exists($oldAvatarPath)) {
                    File::delete($oldAvatarPath);
                }
            }
            $data['avatar_url'] = $this->handleImageUpload($req->file('avatar_url'));
        }
       
        // CORRECTION 4 : File::delete au lieu de Storage::disk('public')->delete
        // Gestion du background
        if ($req->hasFile('background_url')) {
            if ($cards->background_url) {
                $oldBackgroundPath = public_path('images/' . $cards->background_url);
                if (File::exists($oldBackgroundPath)) {
                    File::delete($oldBackgroundPath);
                }
            }
            $data['background_url'] = $this->handleImageUpload($req->file('background_url'));
        }
        
        $cards->update($data);
        return redirect()->route('admin.cards.show', ['id' => $cards->id]);
    }

    public function updateSpeed(Cards $cards, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $cards->update([
                $key => $value
            ]);
        }
       
        return response()->json([
            'isSuccess' => true,
            'data' => $req->all()
        ]);
    }

    public function delete(Cards $cards)
    {
        // CORRECTION 5 : File::delete au lieu de Storage::disk('public')->delete
        // Suppression des images si elles existent
        if ($cards->avatar_url) {
            $avatarPath = public_path('images/' . $cards->avatar_url);
            if (File::exists($avatarPath)) {
                File::delete($avatarPath);
            }
        }
       
        if ($cards->background_url) {
            $backgroundPath = public_path('images/' . $cards->background_url);
            if (File::exists($backgroundPath)) {
                File::delete($backgroundPath);
            }
        }
        
        $cards->delete();
       
        return response()->json([
            'isSuccess' => true
        ]);
    }

    private function handleImageUpload(\Illuminate\Http\UploadedFile|array $images): string|array
    {
        // CORRECTION 6 : Création automatique du dossier public/images
        if (!File::exists(public_path('images'))) {
            File::makeDirectory(public_path('images'), 0755, true);
        }

        if (is_array($images)) {
            $uploadedImages = [];
            foreach ($images as $image) {
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                // CORRECTION 7 : move() vers public/images au lieu de storeAs()
                $image->move(public_path('images'), $imageName);
                // CORRECTION 8 : Retour du nom seulement, pas du chemin
                $uploadedImages[] = $imageName;
            }
            return $uploadedImages;
        } else {
            $imageName = uniqid() . '_' . $images->getClientOriginalName();
            // CORRECTION 9 : move() vers public/images au lieu de storeAs()
            $images->move(public_path('images'), $imageName);
            // CORRECTION 10 : Retour du nom seulement, pas du chemin
            return $imageName;
        }
    }
}