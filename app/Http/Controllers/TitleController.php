<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TitleFormRequest;
use Illuminate\Support\Facades\Storage;

class TitleController extends Controller
{
    public function index(): View
    {
        $titles = Title::orderBy('created_at', 'desc')->paginate(5);
        return view('titles/index', ['titles' => $titles]);
    }

    public function show($id): View
    {
        $title = Title::findOrFail($id);

        return view('titles/show',['title' => $title]);
    }
    public function create(): View
    {
        return view('titles/create');
    }

    public function edit($id): View
    {
        $title = Title::findOrFail($id);
        return view('titles/edit', ['title' => $title]);
    }

    public function store(TitleFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

        

        $title = Title::create($data);
        return redirect()->route('admin.title.show', ['id' => $title->id]);
    }

    public function update(Title $title, TitleFormRequest $req)
    {
        $data = $req->validated();

        

        $title->update($data);

        return redirect()->route('admin.title.show', ['id' => $title->id]);
    }

    public function updateSpeed(Title $title, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $title->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(Title $title)
    {
        
        $title->delete();

        return [
            'isSuccess' => true
        ];
    }

    
}