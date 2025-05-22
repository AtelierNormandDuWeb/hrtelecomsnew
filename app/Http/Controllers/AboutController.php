<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AboutFormRequest;
use Illuminate\Support\Facades\Storage;

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

    public function store(aboutFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

            if ($req->hasFile('imageUrl')) {
        $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
    }

        $about = About::create($data);
        return redirect()->route('admin.about.show', ['id' => $about->id]);
    }

    public function update(About $about, AboutFormRequest $req)
    {
        $data = $req->validated();

            if ($req->hasFile('imageUrl')) {
        // Suppression de l'ancienne image si elle existe
        if ($about->imageUrl) {
            Storage::disk('public')->delete($about->imageUrl);
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
            if ($about->imageUrl) {
        Storage::disk('public')->delete($about->imageUrl);
    }
        $about->delete();

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