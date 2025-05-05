<?php

namespace App\Http\Controllers;

use App\Models\Contactsujet;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactsujetFormRequest;
use Illuminate\Support\Facades\Storage;

class ContactsujetController extends Controller
{
    public function index(): View
    {
        $contactsujets = Contactsujet::orderBy('created_at', 'desc')->paginate(5);
        return view('contactsujets/index', ['contactsujets' => $contactsujets]);
    }

    public function show($id): View
    {
        $contactsujet = Contactsujet::findOrFail($id);

        return view('contactsujets/show',['contactsujet' => $contactsujet]);
    }
    public function create(): View
    {
        return view('contactsujets/create');
    }

    public function edit($id): View
    {
        $contactsujet = Contactsujet::findOrFail($id);
        return view('contactsujets/edit', ['contactsujet' => $contactsujet]);
    }

    public function store(ContactsujetFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

        

        $contactsujet = Contactsujet::create($data);
        return redirect()->route('admin.contactsujet.show', ['id' => $contactsujet->id]);
    }

    public function update(Contactsujet $contactsujet, ContactsujetFormRequest $req)
    {
        $data = $req->validated();

        

        $contactsujet->update($data);

        return redirect()->route('admin.contactsujet.show', ['id' => $contactsujet->id]);
    }

    public function updateSpeed(Contactsujet $contactsujet, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $contactsujet->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(Contactsujet $contactsujet)
    {
        
        $contactsujet->delete();

        return [
            'isSuccess' => true
        ];
    }

    
}