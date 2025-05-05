<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @yield('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
.espero-soft-admin {
    background-color: #ffffff;
}

.espero-soft-admin .row {
    height: 100vh;
}

.espero-soft-admin a {
    text-decoration: inherit;
}

.espero-soft-admin h3 {
    display: block;
    width: 100%;
    text-transform: uppercase;
    background-color: #3f72af;
    color: #ffffff;
    font-weight: bold;
    transition: background 0.3s;
    margin-top: 1rem;
    padding: 0.8rem;
    border-radius: 0.5rem;
}

.espero-soft-admin h3:hover {
    background-color: #5ab9ea;
}


.btn {
    border-radius: 0;
}
    </style>
</head>

<body>
    <div class="container-fluid espero-soft-admin">
        <main id="main-content" class="admin-container">
            <div class="">
                <h2 class="border-bottom admin-h2">HrTelecoms - Tableau de bord</h2>
                <nav id="sidebar" class="">
                    <div class="sidebar-sticky">
                        <a href="{{ route('home') }}">
                            <h3>Retour site Web</h3>
                        </a>
                        <ul class="nav flex-row">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.category.index') }}">
                                    Categories
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.realization.index') }}">
                                    Realisations
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.user.index') }}">
                                    Utilisateurs
                                </a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Déconnecter</a>
                                </form>
                            </li>
                        <li class="nav-item">
    <a class="nav-link" href="{{route('admin.about.index')}}">
        Abouts
    </a>
</li><li class="nav-item">
    <a class="nav-link" href="{{route('admin.title.index')}}">
        Titles
    </a>
</li><li class="nav-item">
    <a class="nav-link" href="{{route('admin.service.index')}}">
        Services
    </a>
</li><li class="nav-item">
    <a class="nav-link" href="{{route('admin.testimonial.index')}}">
        Testimonials
    </a>
</li><li class="nav-item">
    <a class="nav-link" href="{{route('admin.faq.index')}}">
        Faqs
    </a>
</li><li class="nav-item">
    <a class="nav-link" href="{{route('admin.solution.index')}}">
        Solutions
    </a>
</li><li class="nav-item">
    <a class="nav-link" href="{{route('admin.info.index')}}">
        Infos
    </a>
</li><li class="nav-item">
    <a class="nav-link" href="{{route('admin.contactsujet.index')}}">
        Contactsujets
    </a>
</li></ul>
                    </div>
                </nav>

                <div class="p-3">
                    @yield('content')
                </div>
        </main>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    @yield('scripts')

</body>

</html>
