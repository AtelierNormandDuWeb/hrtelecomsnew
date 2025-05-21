<?php

namespace App\Http\Controllers;

use App\Models\Heroslider;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\HerosliderFormRequest;
use Illuminate\Support\Facades\Storage;

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

    public function store(HerosliderFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

            if ($req->hasFile('imageUrl')) {
        $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
    }

        $heroslider = Heroslider::create($data);
        return redirect()->route('admin.heroslider.show', ['id' => $heroslider->id]);
    }

    public function update(Heroslider $heroslider, HerosliderFormRequest $req)
    {
        $data = $req->validated();

            if ($req->hasFile('imageUrl')) {
        // Suppression de l'ancienne image si elle existe
        if ($heroslider->imageUrl) {
            Storage::disk('public')->delete($heroslider->imageUrl);
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
        Storage::disk('public')->delete($heroslider->imageUrl);
    }
        $heroslider->delete();

        return [
            'isSuccess' => true
        ];
    }

        private function handleImageUpload(\Illuminate\Http\UploadedFile|array $images): string|array
    {
        if (is_array($images)) {
            $uploadedImages = [];
            foreach ($images as $image) {
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                $image->storeAs('images', $imageName, 'public');
                $uploadedImages[] = 'images/' . $imageName;
            }
            return $uploadedImages;
        } else {
            $imageName = uniqid() . '_' . $images->getClientOriginalName();
            $images->storeAs('images', $imageName, 'public');
            return 'images/' . $imageName;
        }
    }
}