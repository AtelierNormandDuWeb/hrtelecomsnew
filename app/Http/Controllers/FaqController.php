<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FaqFormRequest;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(5);
        return view('faqs/index', ['faqs' => $faqs]);
    }

    public function show($id): View
    {
        $faq = Faq::findOrFail($id);

        return view('faqs/show',['faq' => $faq]);
    }
    public function create(): View
    {
        return view('faqs/create');
    }

    public function edit($id): View
    {
        $faq = Faq::findOrFail($id);
        return view('faqs/edit', ['faq' => $faq]);
    }

    public function store(FaqFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

        

        $faq = Faq::create($data);
        return redirect()->route('admin.faq.show', ['id' => $faq->id]);
    }

    public function update(Faq $faq, FaqFormRequest $req)
    {
        $data = $req->validated();

        

        $faq->update($data);

        return redirect()->route('admin.faq.show', ['id' => $faq->id]);
    }

    public function updateSpeed(Faq $faq, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $faq->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(Faq $faq)
    {
        
        $faq->delete();

        return [
            'isSuccess' => true
        ];
    }

    
}