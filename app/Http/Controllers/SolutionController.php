<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SolutionFormRequest;
use Illuminate\Support\Facades\Storage;

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
    public function create(): View
    {
        return view('solutions/create');
    }

    public function edit($id): View
    {
        $solution = Solution::findOrFail($id);
        return view('solutions/edit', ['solution' => $solution]);
    }

    public function store(SolutionFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

            if ($req->hasFile('imageUrl')) {
        $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
    }

        $solution = Solution::create($data);
        return redirect()->route('admin.solution.show', ['id' => $solution->id]);
    }

    public function update(Solution $solution, SolutionFormRequest $req)
    {
        $data = $req->validated();

            if ($req->hasFile('imageUrl')) {
        // Suppression de l'ancienne image si elle existe
        if ($solution->imageUrl) {
            Storage::disk('public')->delete($solution->imageUrl);
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
            if ($solution->imageUrl) {
        Storage::disk('public')->delete($solution->imageUrl);
    }
        $solution->delete();

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