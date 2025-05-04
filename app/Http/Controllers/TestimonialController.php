<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TestimonialFormRequest;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(5);
        return view('testimonials/index', ['testimonials' => $testimonials]);
    }

    public function show($id): View
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('testimonials/show',['testimonial' => $testimonial]);
    }
    public function create(): View
    {
        return view('testimonials/create');
    }

    public function edit($id): View
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('testimonials/edit', ['testimonial' => $testimonial]);
    }

    public function store(TestimonialFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

        

        $testimonial = Testimonial::create($data);
        return redirect()->route('admin.testimonial.show', ['id' => $testimonial->id]);
    }

    public function update(Testimonial $testimonial, TestimonialFormRequest $req)
    {
        $data = $req->validated();

        

        $testimonial->update($data);

        return redirect()->route('admin.testimonial.show', ['id' => $testimonial->id]);
    }

    public function updateSpeed(Testimonial $testimonial, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $testimonial->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(Testimonial $testimonial)
    {
        
        $testimonial->delete();

        return [
            'isSuccess' => true
        ];
    }

    
}