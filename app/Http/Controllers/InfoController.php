<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\InfoFormRequest;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index(): View
    {
        $infos = Info::orderBy('created_at', 'desc')->paginate(5);
        return view('infos/index', ['infos' => $infos]);
    }

    public function show($id): View
    {
        $info = Info::findOrFail($id);

        return view('infos/show',['info' => $info]);
    }
    public function create(): View
    {
        return view('infos/create');
    }

    public function edit($id): View
    {
        $info = Info::findOrFail($id);
        return view('infos/edit', ['info' => $info]);
    }

    public function store(InfoFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

        

        $info = Info::create($data);
        return redirect()->route('admin.info.show', ['id' => $info->id]);
    }

    public function update(Info $info, InfoFormRequest $req)
    {
        $data = $req->validated();

        

        $info->update($data);

        return redirect()->route('admin.info.show', ['id' => $info->id]);
    }

    public function updateSpeed(Info $info, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $info->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(Info $info)
    {
        
        $info->delete();

        return [
            'isSuccess' => true
        ];
    }

    
}