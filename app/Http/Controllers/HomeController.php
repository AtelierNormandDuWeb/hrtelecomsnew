<?php

namespace App\Http\Controllers;
use App\Models\Realization;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends Controller
{
    public function index(): View
    {
        $realizations = Realization::orderBy('created_at', 'desc')->paginate(5);
        $abouts = About::orderBy('created_at', 'desc')->paginate(5);

        return view('home', [
            'realizations' => $realizations,
            'abouts' => $abouts

        ]);
    }
}
