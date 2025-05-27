<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CardsFormRequest;
use Illuminate\Support\Facades\Storage;

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

    public function store(CardsFormRequest $req): RedirectResponse
    {
        $data = $req->validated();
        
        if ($req->hasFile('avatar_url')) {
            $data['avatar_url'] = $this->handleImageUpload($req->file('avatar_url'));
        }
        
        if ($req->hasFile('background_url')) {
            $data['background_url'] = $this->handleImageUpload($req->file('background_url'));
        }

        $cards = Cards::create($data);
        return redirect()->route('admin.cards.show', ['id' => $cards->id]);
    }

    public function update(Cards $cards, CardsFormRequest $req)
    {
        $data = $req->validated();
        
        // Gestion de l'avatar
        if ($req->hasFile('avatar_url')) {
            // Suppression de l'ancienne image si elle existe
            if ($cards->avatar_url && Storage::disk('public')->exists($cards->avatar_url)) {
                Storage::disk('public')->delete($cards->avatar_url);
            }
            $data['avatar_url'] = $this->handleImageUpload($req->file('avatar_url'));
        }
        
        // Gestion du background (correction de la condition)
        if ($req->hasFile('background_url')) {
            // Suppression de l'ancienne image si elle existe
            if ($cards->background_url && Storage::disk('public')->exists($cards->background_url)) {
                Storage::disk('public')->delete($cards->background_url);
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
        // Suppression des images si elles existent
        if ($cards->avatar_url && Storage::disk('public')->exists($cards->avatar_url)) {
            Storage::disk('public')->delete($cards->avatar_url);
        }
        
        if ($cards->background_url && Storage::disk('public')->exists($cards->background_url)) {
            Storage::disk('public')->delete($cards->background_url);
        }

        $cards->delete();
        
        return response()->json([
            'isSuccess' => true
        ]);
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