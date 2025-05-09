<?php

namespace App\Http\Controllers;
use App\Models\Realization;
use App\Models\About;
use App\Models\Title;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Solution;
use App\Models\Info;
use App\Models\Contactsujet;
use App\Models\Phoneslider;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends Controller
{
    public function index(): View
    {
        $realizations = Realization::orderBy('created_at', 'desc')->paginate(5);
        $abouts = About::orderBy('created_at', 'desc')->paginate(5);
        $titles = Title::orderBy('created_at', 'desc')->paginate(10);
        $services = Service::orderBy('created_at', 'desc')->paginate(10);
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(10);
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(10);
        $solutions = Solution::orderBy('created_at', 'desc')->paginate(2);
        $infos = Info::orderBy('created_at', 'desc')->paginate(10);
        $contactsujets = Contactsujet::orderBy('created_at', 'asc')->paginate(10);
        $phonesliders = Phoneslider::orderBy('created_at', 'asc')->paginate(1);

        return view('home', [
            'realizations' => $realizations,
            'abouts' => $abouts,
            'titles' => $titles,
            'services' => $services,
            'testimonials' => $testimonials,
            'faqs' => $faqs,
            'solutions' => $solutions,
            'infos' => $infos,
            'contactsujets' => $contactsujets,
            'phonesliders' => $phonesliders
        ]);
    }
}
