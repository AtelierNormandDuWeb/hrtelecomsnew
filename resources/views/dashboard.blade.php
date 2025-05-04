<x-app-layout>
    <section class="dashboard-section">
        <div class="container">
            
            <div class="dashboard-content">
                <p>Bienvenue dans votre espace personnel !</p>
                <p>Vous pouvez ajouter une ou plusieurs réalisation ici:</p>
            </div>
            <ul class="nav-links-c">
                <li>
                    <a href="{{ route('admin.realization.index') }}"
                       class="nav-link-c dashboard-title {{ request()->routeIs('admin.realization.*') ? 'active' : '' }}">
                        Ajouter une réalisation
                    </a>
                </li>
            </ul>  
            <div class="dashboard-content">
                <p class="logged-status">✔️ Vous êtes connecté.</p>
            </div>
        </div>      
    </section>
</x-app-layout>
