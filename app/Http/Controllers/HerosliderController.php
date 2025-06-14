<?php
namespace App\Http\Controllers;
use App\Models\Heroslider;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;

class HerosliderController extends Controller
{
    public function index(): View
    {
        $herosliders = Heroslider::orderBy('created_at', 'desc')->paginate(10);
        return view('herosliders/index', ['herosliders' => $herosliders]);
    }

    public function show($id): View
    {
        $heroslider = Heroslider::findOrFail($id);
        return view('herosliders/show',['heroslider' => $heroslider]);
    }

    public function create(): View
    {
        return view('herosliders/create');
    }

    public function edit($id): View
    {
        $heroslider = Heroslider::findOrFail($id);
        return view('herosliders/edit', ['heroslider' => $heroslider]);
    }

    public function store(Request $req): RedirectResponse
    {
        $data = $req->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button' => 'required|string|max:255',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($req->hasFile('imageUrl')) {
            $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
        }

        $heroslider = Heroslider::create($data);
        return redirect()->route('admin.heroslider.show', ['id' => $heroslider->id]);
    }

    public function update(Heroslider $heroslider, Request $req)
    {
        $data = $req->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button' => 'required|string|max:255',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($req->hasFile('imageUrl')) {
            // Suppression de l'ancienne image si elle existe
            if ($heroslider->imageUrl) {
                $oldImagePath = public_path('images/' . $heroslider->imageUrl);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
        }

        $heroslider->update($data);
        return redirect()->route('admin.heroslider.show', ['id' => $heroslider->id]);
    }

    public function updateSpeed(Heroslider $heroslider, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $heroslider->update([
                $key => $value
            ]);
        }
        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(Heroslider $heroslider)
    {
        if ($heroslider->imageUrl) {
            $imagePath = public_path('images/' . $heroslider->imageUrl);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $heroslider->delete();
        return [
            'isSuccess' => true
        ];
    }

    private function handleImageUpload(\Illuminate\Http\UploadedFile|array $images): string|array
    {
        // Créer le dossier public/images s'il n'existe pas
        if (!File::exists(public_path('images'))) {
            File::makeDirectory(public_path('images'), 0755, true);
        }

        if (is_array($images)) {
            $uploadedImages = [];
            foreach ($images as $image) {
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $uploadedImages[] = $imageName;
            }
            return $uploadedImages;
        } else {
            $imageName = uniqid() . '_' . $images->getClientOriginalName();
            $images->move(public_path('images'), $imageName);
            return $imageName;
        }
    }
}