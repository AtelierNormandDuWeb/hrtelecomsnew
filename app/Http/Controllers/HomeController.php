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
use App\Models\Heroslider;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends Controller
{
    public function index(): View
    {
        $abouts = About::orderBy('created_at', 'desc')->paginate(5);
        $titles = Title::orderBy('created_at', 'desc')->paginate(10);
        $services = Service::orderBy('created_at', 'desc')->paginate(10);
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(10);
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(10);
        $solutions = Solution::orderBy('created_at', 'desc')->paginate(2);
        $infos = Info::orderBy('created_at', 'desc')->paginate(10);
        $contactsujets = Contactsujet::orderBy('created_at', 'asc')->get();
        $phonesliders = Phoneslider::orderBy('created_at', 'asc')->paginate(1);
        $herosliders = Heroslider::orderBy('created_at', 'asc')->paginate(10);

        return view('home', [
            'abouts' => $abouts,
            'titles' => $titles,
            'services' => $services,
            'testimonials' => $testimonials,
            'faqs' => $faqs,
            'solutions' => $solutions,
            'infos' => $infos,
            'contactsujets' => $contactsujets,
            'phonesliders' => $phonesliders,
            'herosliders' => $herosliders
        ]);
    }

        public function pagecontact(): View
    {
        $titles = Title::orderBy('created_at', 'desc')->get();
        $infos = Info::orderBy('created_at', 'desc')->get();
        $contactsujets = Contactsujet::orderBy('created_at', 'asc')->get();
        
        return view('pagecontact', [
            'titles' => $titles,
            'infos' => $infos,
            'contactsujets' => $contactsujets
        ]);
    }
}
