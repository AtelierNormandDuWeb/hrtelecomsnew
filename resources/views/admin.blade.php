<!DOCTYPE html>
<html lang="fr">

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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('styles')
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        *,
        *::before,
        *::after {
            box-sizing: inherit;
        }

        a {
            text-decoration: none;
        }

        .text-light {
            font-weight: 300;
        }

        .text-bold {
            font-weight: bold;
        }

        .row {
            display: flex;
        }

        .row--align-v-center {
            align-items: center;
        }

        .row--align-h-center {
            justify-content: center;
        }

        .grid {
            position: relative;
            display: grid;
            grid-template-columns: 100%;
            grid-template-rows: 0px 1fr 50px;
            grid-template-areas: "header" "main" "footer";
            height: 100vh;
            overflow-x: hidden;
            margin-top: 0;
        }

        .grid--noscroll {
            overflow-y: hidden;
        }

        .header {
            grid-area: header;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: transparent;
            height: 0;
            position: absolute;
            width: 100%;
            z-index: 5;
        }

        .header__menu {
            position: fixed;
            padding: 13px;
            left: 12px;
            top: 12px;
            background-color: #DADAE3;
            border-radius: 50%;
            z-index: 10;
            cursor: pointer;
        }

        .sidenav {
            position: fixed;
            grid-area: sidenav;
            height: 100%;
            overflow-y: auto;
            background-color: #3f72af;
            color: #FFF;
            width: 240px;
            transform: translateX(-245px);
            transition: all 0.6s ease-in-out;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
            z-index: 2;
        }

        .sidenav__brand {
            position: relative;
            display: flex;
            align-items: center;
            padding: 0 16px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.15);
        }

        .sidenav__brand-close {
            position: absolute;
            right: 8px;
            top: 8px;
            visibility: visible;
            color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
        }

        .sidenav__profile {
            display: flex;
            align-items: center;
            min-height: 90px;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidenav__profile-avatar {
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.2);
            height: 64px;
            width: 64px;
            margin: 0 15px;
        }

        .sidenav__profile-adress {
            padding: 2rem 1rem;
        }

        .sidenav__profile a {
            color: #3f72af;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidenav__profile a:hover {
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .sidenav--active {
            transform: translateX(0);
        }

        .navList {
            width: 240px;
            padding: 0;
            margin: 0;
            background-color: #3f72af;
            list-style-type: none;
        }

        .navList__heading {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 16px 3px;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            font-size: 15px;
        }

        .navList__subheading {
            position: relative;
            padding: 10px 30px;
            color: #fff;
            font-size: 16px;
            text-transform: capitalize;
        }

        .navList__subheading-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #888;
            width: 20px;
        }

        .navList__heading i {
            margin-left: 8px;
            font-size: 16px;
        }

        .navList__subheading-title {
            margin: 0 15px;
        }

        .navList__subheading:after {
            position: absolute;
            content: "";
            height: 6px;
            width: 6px;
            top: 17px;
            right: 25px;
            border-left: 1px solid rgba(255, 255, 255, 0.5);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            transform: rotate(225deg);
            transition: all 0.2s;
        }

        .navList__subheading:hover {
            background-color: #3f72af;
            cursor: pointer;
        }

        .navList__subheading--open {
            background-color: #3f72af;
        }

        .navList__subheading--open:after {
            transform: rotate(315deg);
        }

        .navList .subList {
            padding: 0;
            margin: 0;
            list-style-type: none;
            background-color: #3f72af;
            visibility: visible;
            overflow: hidden;
            max-height: 200px;
            transition: all 0.4s ease-in-out;
        }

        .navList .subList__item {
            padding: 8px;
            text-transform: capitalize;
            padding: 8px 30px;
            color: #D3D3D3;
        }

        .navList .subList__item:first-child {
            padding-top: 15px;
        }

        .navList .subList__item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            cursor: pointer;
        }

        .navList .subList--hidden {
            visibility: hidden;
            max-height: 0;
        }

        .main {
            grid-area: main;
            background-color: #EAEDF1;
            color: #394263;
        }

        :root {
            font-size: 16px;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        *,
        *::before,
        *::after {
            box-sizing: inherit;
        }

        a {
            text-decoration: none;
        }

        .text-bold {
            font-weight: bold;
        }

        .row {
            display: flex;
        }

        .row--align-v-center {
            align-items: center;
        }

        .row--align-h-center {
            justify-content: center;
        }

        .grid {
            position: relative;
            display: grid;
            grid-template-columns: 100%;
            grid-template-rows: 0px 1fr 50px;
            grid-template-areas: "header" "main" "footer";
            height: 100vh;
            overflow-x: hidden;
        }

        .grid--noscroll {
            overflow-y: hidden;
        }

        .header {
            grid-area: header;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #F9FAFC;
        }

        .header__menu {
            position: fixed;
            padding: 13px;
            left: 12px;
            background-color: #DADAE3;
            border-radius: 50%;
            z-index: 1;
            cursor: pointer;
        }

        .contact-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: auto;
            padding: 20px 10px;
            width: 100%;
            margin-top: 40px;
        }

        .contact-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #3f72af;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .contact-btn:hover {
            transform: translateY(-3px);
        }

        .contact-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #3f72af;
            margin-bottom: 8px;
        }

        .contact-icon i {
            color: white;
            font-size: 20px;
        }

        .sidenav {
            position: fixed;
            grid-area: sidenav;
            height: 100%;
            overflow-y: auto;
            background-color: #ffffff;
            color: #000000;
            width: 305px;
            transform: translateX(-305px);
            transition: all 0.6s ease-in-out;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
            z-index: 10;
            display: flex;
            flex-direction: column;
        }

        .sidenav__brand {
            position: relative;
            display: flex;
            align-items: center;
            padding: 0 16px;
            height: 50px;
            background-color: #ffffff;
        }

        .sidenav__brand-close {
            position: absolute;
            right: 8px;
            top: 8px;
            visibility: visible;
            color: #3f72af;
            cursor: pointer;
        }

        .sidenav__profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            min-height: 90px;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidenav__profile-avatar {
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.2);
            height: 64px;
            width: 64px;
            margin: 0 15px;
        }

        .sidenav__profile-title {
            font-size: 17px;
            letter-spacing: 1px;
        }

        .sidenav__profile-title img {
            width: 100%;
            height: 100%;
            padding: 1rem;
            border-bottom: #cfcfcf solid 2px;
        }

        .sidenav--active {
            transform: translateX(0);
        }

        .sidenav__profile h2 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .sidenav__profile a {
            color: #3f72af;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidenav__profile a:hover {
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .navList {
            width: 100%;
            max-width: 305px;
            padding: 0;
            margin: 0;
            background-color: #ffffff;
            color: #000000;
            list-style-type: none;
        }

        .navList__subheading i {
            color: #888;
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        .navList__subheading-title span {
            color: #3f72af;
            font-weight: bold;
            margin-right: 4px;
        }

        .navList__heading {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 16px 3px;
            color: rgba(54, 54, 54, 0.8);
            text-transform: uppercase;
            font-size: 15px;
            font-weight: bold;
            border-left: 4px solid #3f72af;
        }

        .navList__subheading {
            position: relative;
            padding: 10px 30px;
            color: rgba(54, 54, 54, 0.5);
            font-size: 16px;
            text-transform: capitalize;
        }

        .navList__subheading-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
            width: 12px;
        }

        .navList__subheading-title {
            margin: 0 15px;
        }

        .navList__subheading:after {
            position: absolute;
            content: "";
            height: 6px;
            width: 6px;
            top: 17px;
            right: 25px;
            border-left: 1px solid rgba(54, 54, 54, 0.5);
            border-bottom: 1px solid rgba(54, 54, 54, 0.5);
            transform: rotate(225deg);
            transition: all 0.2s;
        }

        .navList__subheading:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .navList__subheading--open {
            background-color: #f5f5f5;
        }

        .navList__subheading--open:after {
            transform: rotate(315deg);
        }

        .navList .subList {
            display: flex;
            flex-direction: column-reverse;
            align-items: start;
            padding: 10px 60px;
            margin: 0;
            list-style-type: none;
            background-color: #f9f9f9;
            visibility: visible;
            overflow: hidden;
            max-height: 200px;
            transition: all 0.4s ease-in-out;
        }

        .navList .subList__item {
            padding: 8px;
            text-transform: capitalize;
            padding: 8px 30px;
            color: #777;
        }

        .navList .subList__item:first-child {
            padding-top: 15px;
        }

        .navList .subList__item:hover {
            background-color: #efefef;
            cursor: pointer;
        }

        .navList .subList--hidden {
            visibility: hidden;
            max-height: 0;
        }

        .main {
            grid-area: main;
            background-color: #EAEDF1;
            color: #394263;
        }

        .main-header {
            position: relative;
            display: flex;
            justify-content: space-between;
            height: 250px;
            color: #FFF;
            background-size: cover;
            margin-bottom: 20px;
        }

        .main-header::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #3f72af;
            z-index: 1;
        }

        .main-header__intro-wrapper {
            display: flex;
            flex: 1;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            height: 160px;
            padding: 12px 30px;
            background: rgba(255, 255, 255, 0.12);
            font-size: 26px;
            letter-spacing: 1px;
            position: relative;
            z-index: 2;
        }

        .main-header__welcome {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            justify-content: center;
        }

        .main-header__welcome-title {
            margin-bottom: 8px;
            font-size: 26px;
            position: relative;
            z-index: 3;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        .main-header__welcome-subtitle {
            font-size: 18px;
            position: relative;
            z-index: 3;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        .footer {
            grid-area: footer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            color: #777;
            background-color: #FFF;
        }

        .footer__copyright {
            color: #1BBAE1;
        }

        .footer__signature {
            color: #1BBAE1;
            cursor: pointer;
            font-weight: bold;
        }

        /* Media Queries */
        @media only screen and (max-width: 46.875em) {
            .main-header__welcome-title {
                font-size: 22px;
            }

            .main-header__welcome-subtitle {
                font-size: 14px;
            }
        }

        @media only screen and (min-width: 46.875em) {
            .grid {
                display: grid;
                grid-template-columns: 305px calc(100% - 305px);
                grid-template-rows: 0px 1fr 50px;
                grid-template-areas: "sidenav header" "sidenav main" "sidenav footer";
                height: 100vh;
            }

            .sidenav {
                position: relative;
                transform: translateX(0);
                padding-bottom: 20px;
                display: flex;
                flex-direction: column;
            }

            .sidenav__brand-close {
                visibility: hidden;
            }

            .main-header__intro-wrapper {
                padding: 0 30px;
            }

            .header__menu {
                display: none;
            }
        }

        @media only screen and (min-width: 65.625em) {
            .main-header__intro-wrapper {
                flex-direction: row;
                justify-content: center;
            }

            .main-header__welcome {
                align-items: center;
                text-align: center;
            }
        }

        .main-header__intro-wrapper {
            display: flex;
            flex: 1;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            height: 160px;
            padding: 12px 30px;
            background: rgba(255, 255, 255, 0.12);
            font-size: 26px;
            letter-spacing: 1px;
            position: relative;
            z-index: 2;
        }

        .main-header__welcome {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .main-header__welcome-title {
            margin-bottom: 8px;
            font-size: 26px;
            position: relative;
            z-index: 3;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        .main-header__welcome-subtitle {
            font-size: 18px;
            position: relative;
            z-index: 3;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        .footer {
            grid-area: footer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            color: #777;
            background-color: #FFF;
        }

        .footer__copyright {
            color: #1BBAE1;
        }

        .footer__signature {
            color: #1BBAE1;
            cursor: pointer;
            font-weight: bold;
        }

        /* Media Queries */
        @media only screen and (max-width: 46.875em) {
            .main-header__welcome-title {
                font-size: 22px;
            }

            .main-header__welcome-subtitle {
                font-size: 14px;
            }
        }

        @media only screen and (min-width: 46.875em) {
            .grid {
                display: grid;
                /* grid-template-columns: 240px calc(100% - 240px); */
                grid-template-rows: 0px 1fr 50px;
                grid-template-areas: "sidenav header" "sidenav main" "sidenav footer";
                height: 100vh;
            }

            .sidenav {
                position: relative;
                transform: translateX(0);
            }

            .sidenav__brand-close {
                visibility: hidden;
            }

            .main-header__intro-wrapper {
                padding: 0 30px;
            }

            .header__menu {
                display: none;
            }
        }

        @media only screen and (min-width: 65.625em) {
            .main-header__intro-wrapper {
                flex-direction: row;
            }

            .main-header__welcome {
                align-items: flex-start;
                text-align: left;
            }
        }

        #Espero .espero-soft-admin {
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
    <header class="header">
        <i class="fas fa-bars header__menu"></i>
    </header>
    <div class="grid">
        <aside class="sidenav">
            <div class="sidenav__brand">
                <i class="fas fa-times sidenav__brand-close"></i>
            </div>
            <div class="sidenav__profile">
                <div class="sidenav__profile-title">
                    {{-- <img src="images/logo.jpg" alt="image du logo"> --}}
                    {{-- <a href="#" class="logo"> --}}
                    <img class="logo-icon" src="{{ asset('images/Logo.png') }}" alt="Logo de l'entreprise HrTélécoms">
                    {{-- </a> --}}
                </div>
                <div class="sidenav__profile-adress">
                    <h2>HrTelecoms - Tableau de bord</h2>
                    <a href="{{ route('home') }}">
                        <h3>Retour site Web</h3>
                    </a>
                </div>
            </div>
            <div class="row row--align-v-center row--align-h-center">
                <ul class="navList">
                    <li>
                        <div class="navList__subheading row row--align-v-center navList__subheading--open">
                            {{-- <i class="fas"></i> --}}
                            <span class="navList__subheading-title">A propos</span>
                        </div>
                        <ul class="subList">
                            <li class="subList__item">
                                <a class="nav-link" href="{{ route('admin.about.index') }}">
                                    A propos
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="navList__subheading row row--align-v-center navList__subheading--open">
                            {{-- <i class="fas  fa-list-ul"></i> --}}
                            <span class="navList__subheading-title">Titre</span>
                        </div>
                        <ul class="subList">
                            <li class="subList__item">
                                <a class="nav-link" href="{{ route('admin.title.index') }}">
                                    Les titres
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="navList__subheading row row--align-v-center navList__subheading--open">
                            {{-- <i class="fas  fa-list-ul"></i> --}}
                            <span class="navList__subheading-title">Services</span>
                        </div>
                        <ul class="subList">
                            <li class="subList__item">
                                <a class="nav-link" href="{{ route('admin.service.index') }}">
                                    Les Services
                                </a>
                            </li>
                        </ul>
                    </li>

                                        <li>
                        <div class="navList__subheading row row--align-v-center navList__subheading--open">
                            {{-- <i class="fas  fa-list-ul"></i> --}}
                            <span class="navList__subheading-title">Avis</span>
                        </div>
                        <ul class="subList">
                            <li class="subList__item">
                                <a class="nav-link" href="{{ route('admin.testimonial.index') }}">
                                    Les avis
                                </a>
                            </li>
                    
                        </ul>
                    </li>

                                        <li>
                        <div class="navList__subheading row row--align-v-center navList__subheading--open">
                            {{-- <i class="fas  fa-list-ul"></i> --}}
                            <span class="navList__subheading-title">Questions</span>
                        </div>
                        <ul class="subList">
                            <li class="subList__item">
                                <a class="nav-link" href="{{ route('admin.faq.index') }}">
                                    Foire aux questions
                                </a>
                            </li>
                        </ul>
                    </li>

                    
                    <li>
                        <div class="navList__subheading row row--align-v-center navList__subheading--open">
                            {{-- <i class="fas  fa-list-ul"></i> --}}
                            <span class="navList__subheading-title">Solutions</span>
                        </div>
                        <ul class="subList">
                            <li class="subList__item">
                                <a class="nav-link" href="{{ route('admin.solution.index') }}">
                                    Nos solutions
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <div class="navList__subheading row row--align-v-center navList__subheading--open">
                            {{-- <i class="fas  fa-list-ul"></i> --}}
                            <span class="navList__subheading-title">Informations</span>
                        </div>
                        <ul class="subList">
                            <li class="subList__item">
                                <a class="nav-link" href="{{ route('admin.info.index') }}">
                                    Les informations
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <div class="navList__subheading row row--align-v-center navList__subheading--open">
                            {{-- <i class="fas  fa-list-ul"></i> --}}
                            <span class="navList__subheading-title">Contact</span>
                        </div>
                        <ul class="subList">
                            <li class="subList__item">
                                <a class="nav-link" href="{{ route('admin.contactsujet.index') }}">
                                    Formulaire de contact
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            {{-- <i class="fas fa-user"></i> --}}
                            <span class="navList__subheading-title">Gestion</span>
                        </div>
                        <ul class="subList subList--hidden">
                            <li class="subList__item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Déconnecter</a>
                                </form>
                            </li>
                            <li class="subList__item">
                                <a class="nav-link" href="{{ route('admin.user.index') }}">
                                    Utilisateurs
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li>
                        <div class="navList__subheading row row--align-v-center">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="navList__subheading-title">Horaires et plan</span>
                        </div>
                    </li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <i class="fas fa-heart"></i>
                            <span class="navList__subheading-title">Favoris</span>
                        </div>
                    </li>
                    <li>
                        <div class="navList__subheading row row--align-v-center">
                            <i class="fas fa-mobile-alt"></i>
                            <span class="navList__subheading-title">Partage SMS</span>
                        </div>
                    </li> --}}
                </ul>
            </div>

            <div class="contact-buttons">
                <a href="#" class="contact-btn">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <span>Nous contacter</span>
                </a>
                <a href="#" class="contact-btn">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <span>Nous appeler</span>
                </a>
            </div>
        </aside>
        <main class="main">
            <div class="main-header">
                <div class="main-header__intro-wrapper">
                    <div class="main-header__welcome">
                        <h1 class="main-header__welcome-title">HrTelecoms - Tableau de bord</h1>
                        <p class="main-header__welcome-subtitle">Gerez ici votre site web</p>
                    </div>
                </div>
            </div>
            <div class="p-3">
                @yield('content')
            </div>
        </main>
        <footer class="footer">
            <p><span class="footer__copyright">&copy;</span> HrTélécoms 2025</p>
            <p><a href="" class="footer__signature">Doko972</a></p>
        </footer>
    </div>
    <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
    <script>
        /* Scripts pour le dashboard en CSS grid */
        $(document).ready(() => {
            addResizeListeners();
            setSidenavListeners();
            setMenuClickListener();
            setSidenavCloseListener();
        });

        // Constantes et éléments du DOM
        const sidenavEl = $('.sidenav');
        const gridEl = $('.grid');
        const SIDENAV_ACTIVE_CLASS = 'sidenav--active';
        const GRID_NO_SCROLL_CLASS = 'grid--noscroll';

        // Fonction utilitaire pour basculer une classe
        function toggleClass(el, className) {
            if (el.hasClass(className)) {
                el.removeClass(className);
            } else {
                el.addClass(className);
            }
        }

        // Fonctionnalité de glissement pour les sous-menus de navigation
        function setSidenavListeners() {
            const subHeadings = $('.navList__subheading');
            const SUBHEADING_OPEN_CLASS = 'navList__subheading--open';
            const SUBLIST_HIDDEN_CLASS = 'subList--hidden';

            subHeadings.each((i, subHeadingEl) => {
                $(subHeadingEl).on('click', (e) => {
                    const subListEl = $(subHeadingEl).siblings();

                    // Ajouter/supprimer les styles sélectionnés à l'en-tête de la catégorie de liste
                    if (subHeadingEl) {
                        toggleClass($(subHeadingEl), SUBHEADING_OPEN_CLASS);
                    }

                    // Afficher/masquer la sous-liste
                    if (subListEl && subListEl.length === 1) {
                        toggleClass($(subListEl), SUBLIST_HIDDEN_CLASS);
                    }
                });
            });
        }

        // Si l'utilisateur ouvre le menu puis agrandit la fenêtre du mobile sans fermer le menu,
        // s'assurer que le défilement est activé et que la classe active sidenav est supprimée
        function addResizeListeners() {
            $(window).resize(function(e) {
                const width = window.innerWidth;

                if (width > 750) {
                    sidenavEl.removeClass(SIDENAV_ACTIVE_CLASS);
                    gridEl.removeClass(GRID_NO_SCROLL_CLASS);
                }
            });
        }

        // Icône du menu pour ouvrir la barre latérale, affichée uniquement sur mobile
        function setMenuClickListener() {
            $('.header__menu').on('click', function(e) {
                toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
                toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
            });
        }

        // Icône de fermeture de la barre latérale
        function setSidenavCloseListener() {
            $('.sidenav__brand-close').on('click', function(e) {
                toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
                toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
            });
        }
    </script>
</body>

</html>
