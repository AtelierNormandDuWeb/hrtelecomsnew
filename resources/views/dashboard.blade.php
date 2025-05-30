@extends('base')
@section('content')
@include('sections.accessibilitytools')
    <section class="dashboard-section">
        <div class="container">
            
            <div class="dashboard-content">
                <p>Bienvenue dans votre espace personnel !</p>
                <p>Vous pouvez gerer votre site web ici :</p>
            </div>
            <ul class="nav-links-c">
                <li>
                    <a href="{{ route('admin.heroslider.index') }}"
                       class="nav-link-c dashboard-title {{ request()->routeIs('admin.heroslider.*') ? 'active' : '' }}">
                        Cliquez ici
                    </a>
                </li>
            </ul>  
            <div class="dashboard-content">
                <p class="logged-status">✔️ Vous êtes connecté.</p>
            </div>
        </div>      
    </section>
@endsection
