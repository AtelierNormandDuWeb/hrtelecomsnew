<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ServiceFormRequest;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(5);
        return view('services/index', ['services' => $services]);
    }

    public function show($id): View
    {
        $service = Service::findOrFail($id);

        return view('services/show',['service' => $service]);
    }
    public function create(): View
    {
        return view('services/create');
    }

    public function edit($id): View
    {
        $service = Service::findOrFail($id);
        return view('services/edit', ['service' => $service]);
    }

    public function store(ServiceFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

        

        $service = Service::create($data);
        return redirect()->route('admin.service.show', ['id' => $service->id]);
    }

    public function update(Service $service, ServiceFormRequest $req)
    {
        $data = $req->validated();

        

        $service->update($data);

        return redirect()->route('admin.service.show', ['id' => $service->id]);
    }

    public function updateSpeed(Service $service, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $service->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(Service $service)
    {
        
        $service->delete();

        return [
            'isSuccess' => true
        ];
    }

    
}