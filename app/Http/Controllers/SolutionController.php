<?php
namespace App\Http\Controllers;
use App\Models\Solution;
use App\Models\Title;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
// SUPPRESSION : use App\Http\Requests\SolutionFormRequest;
use Illuminate\Support\Facades\File; // NOUVEAU : File au lieu de Storage

class SolutionController extends Controller
{
    public function index(): View
    {
        $solutions = Solution::orderBy('created_at', 'desc')->paginate(5);
        return view('solutions/index', ['solutions' => $solutions]);
    }

    public function show($id): View
    {
        $solution = Solution::findOrFail($id);
        return view('solutions/show',['solution' => $solution]);
    }

    public function publicIndex(): View
    {
        $titles = Title::all();
        $solutions = Solution::orderBy('created_at', 'desc')->get();
       
        return view('solutions.public', compact('titles', 'solutions'));
    }

    public function create(): View
    {
        return view('solutions/create');
    }

    public function edit($id): View
    {
        $solution = Solution::findOrFail($id);
        return view('solutions/edit', ['solution' => $solution]);
    }

    // CORRECTION 1 : Request au lieu de SolutionFormRequest + validation manuelle
    public function store(Request $req): RedirectResponse
    {
        // CORRECTION 2 : Validation avec les vrais champs du modèle Solution
        $data = $req->validate([
            'button1' => 'nullable|string|max:255',
            'button2' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'liste1' => 'nullable|string',
            'liste2' => 'nullable|string',
            'liste3' => 'nullable|string',
            'liste4' => 'nullable|string',
            'liste5' => 'nullable|string',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($req->hasFile('imageUrl')) {
            $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
        }

        $solution = Solution::create($data);
        return redirect()->route('admin.solution.show', ['id' => $solution->id]);
    }

    // CORRECTION 3 : Request au lieu de SolutionFormRequest + validation manuelle
    public function update(Solution $solution, Request $req)
    {
        // CORRECTION 4 : Validation avec les vrais champs du modèle Solution
        $data = $req->validate([
            'button1' => 'nullable|string|max:255',
            'button2' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'liste1' => 'nullable|string',
            'liste2' => 'nullable|string',
            'liste3' => 'nullable|string',
            'liste4' => 'nullable|string',
            'liste5' => 'nullable|string',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($req->hasFile('imageUrl')) {
            // CORRECTION 5 : File::delete au lieu de Storage::disk('public')->delete
            if ($solution->imageUrl) {
                $oldImagePath = public_path('images/' . $solution->imageUrl);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
        }

        $solution->update($data);
        return redirect()->route('admin.solution.show', ['id' => $solution->id]);
    }

    public function updateSpeed(Solution $solution, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $solution->update([
                $key => $value
            ]);
        }
        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(Solution $solution)
    {
        // CORRECTION 6 : File::delete au lieu de Storage::disk('public')->delete
        if ($solution->imageUrl) {
            $imagePath = public_path('images/' . $solution->imageUrl);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $solution->delete();
        return [
            'isSuccess' => true
        ];
    }

    private function handleImageUpload(\Illuminate\Http\UploadedFile|array $images): string|array
    {
        // CORRECTION 7 : Création automatique du dossier public/images
        if (!File::exists(public_path('images'))) {
            File::makeDirectory(public_path('images'), 0755, true);
        }

        if (is_array($images)) {
            $uploadedImages = [];
            foreach ($images as $image) {
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                // CORRECTION 8 : move() vers public/images au lieu de storeAs()
                $image->move(public_path('images'), $imageName);
                // CORRECTION 9 : Retour du nom seulement, pas du chemin
                $uploadedImages[] = $imageName;
            }
            return $uploadedImages;
        } else {
            $imageName = uniqid() . '_' . $images->getClientOriginalName();
            // CORRECTION 10 : move() vers public/images au lieu de storeAs()
            $images->move(public_path('images'), $imageName);
            // CORRECTION 11 : Retour du nom seulement, pas du chemin
            return $imageName;
        }
    }
}