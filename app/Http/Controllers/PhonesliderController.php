<?php

namespace App\Http\Controllers;

use App\Models\Phoneslider;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PhonesliderFormRequest;
use Illuminate\Support\Facades\Storage;

class PhonesliderController extends Controller
{
    public function index(): View
    {
        $phonesliders = Phoneslider::orderBy('created_at', 'desc')->paginate(5);
        return view('phonesliders/index', ['phonesliders' => $phonesliders]);
    }

    public function show($id): View
    {
        $phoneslider = Phoneslider::findOrFail($id);

        return view('phonesliders/show',['phoneslider' => $phoneslider]);
    }
    public function create(): View
    {
        return view('phonesliders/create');
    }

    public function edit($id): View
    {
        $phoneslider = Phoneslider::findOrFail($id);
        return view('phonesliders/edit', ['phoneslider' => $phoneslider]);
    }

    public function store(PhonesliderFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

            if ($req->hasFile('imageUrl')) {
        $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
    }

        $phoneslider = Phoneslider::create($data);
        return redirect()->route('admin.phoneslider.show', ['id' => $phoneslider->id]);
    }

    public function update(Phoneslider $phoneslider, PhonesliderFormRequest $req)
    {
        $data = $req->validated();

            if ($req->hasFile('imageUrl')) {
        // Suppression de l'ancienne image si elle existe
        if ($phoneslider->imageUrl) {
            Storage::disk('public')->delete($phoneslider->imageUrl);
        }
        $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
    }

        $phoneslider->update($data);

        return redirect()->route('admin.phoneslider.show', ['id' => $phoneslider->id]);
    }

    public function updateSpeed(Phoneslider $phoneslider, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $phoneslider->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(Phoneslider $phoneslider)
    {
            if ($phoneslider->imageUrl) {
        Storage::disk('public')->delete($phoneslider->imageUrl);
    }
        $phoneslider->delete();

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