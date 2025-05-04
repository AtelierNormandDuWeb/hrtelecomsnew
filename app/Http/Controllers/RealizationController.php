<?php

namespace App\Http\Controllers;

use App\Models\Realization;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RealizationFormRequest;
use Illuminate\Support\Facades\Storage;

class RealizationController extends Controller
{
    public function index(): View
    {
        $realizations = Realization::orderBy('created_at', 'desc')->paginate(10);
        return view('realizations/index', ['realizations' => $realizations]);
    }

    public function show($id): View
    {
        $realization = Realization::findOrFail($id);

        return view('realizations/show', ['realization' => $realization]);
    }
    public function create(): View
    {
        $categories = Category::all();

        return view('realizations/create', ['categories' => $categories]);
    }

    public function edit($id): View
    {
        $realization = Realization::findOrFail($id);

        $categories = Category::all();

        return view('realizations/edit', ['realization' => $realization, 'categories' => $categories]);
    }

    public function store(RealizationFormRequest $req): RedirectResponse
    {
        $categories = $req->validated('categories');
        $data = $req->validated();

        // Nettoyer le champ 'additionalInfos'
        if (isset($data['additionalInfos'])) {
            $data['additionalInfos'] = strip_tags($data['additionalInfos']);
        }

        if (isset($data['moreDescription'])) {
            $data['moreDescription'] = strip_tags($data['moreDescription']);
        }

        if ($req->hasFile('imageUrls')) {
            $data['imageUrls'] = json_encode($this->handleImageUpload($req->file('imageUrls')));
        }

        $realization = Realization::create($data);

        $realization->categories()->sync($categories);

        return redirect()->route('admin.realization.show', ['id' => $realization->id]);
    }

    public function update(Realization $realization, RealizationFormRequest $req)
    {
        $categories = $req->validated('categories');
        $data = $req->validated();

        // Nettoyer le champ 'additionalInfos'
        if (isset($data['additionalInfos'])) {
            $data['additionalInfos'] = strip_tags($data['additionalInfos']);
        }

        if (isset($data['moreDescription'])) {
            $data['moreDescription'] = strip_tags($data['moreDescription']);
        }

        if ($req->hasFile('imageUrls')) {
            $uploadedImages = $this->handleImageUpload($req->file('imageUrls'));
            // Suppression des anciennes images s'il en existe
            if ($realization->imageUrls && is_array($realization->imageUrls)) {
                foreach ($realization->imageUrls as $imageUrl) {
                    Storage::disk('public')->delete($imageUrl);
                }
            }
            $data['imageUrls'] = json_encode($uploadedImages);
        }

        $realization->update($data);

        $realization->categories()->sync($categories);

        return redirect()->route('admin.realization.show', ['id' => $realization->id]);
    }

    public function updateSpeed(Realization $realization, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $realization->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(Realization $realization)
    {
        if ($realization->imageUrls) {
            foreach ($realization->imageUrls as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $realization->delete();

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