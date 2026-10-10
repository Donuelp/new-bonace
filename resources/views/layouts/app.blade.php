<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bonace Admin</title>

    {{-- Bootstrap + Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Page-specific CSS --}}
    @stack('styles')

    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
        }

        /* ==========================
           NAVBAR
        ========================== */

        .main-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .navbar-brand {
            color: #212529 !important;
            font-weight: 700;
        }

        .navbar-brand:hover {
            color: #0d6efd !important;
        }

        .navbar .nav-link {
            color: #495057 !important;
        }

        .navbar .nav-link:hover {
            color: #0d6efd !important;
        }


        /* ==========================
           SIDEBAR
        ========================== */

        .sidebar {
            background-color: #ffffff;
            border-right: 1px solid #e9ecef;
            min-height: calc(100vh - 57px);
        }

        .sidebar-title {
            color: #adb5bd;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 1rem 1rem 0.5rem;
        }

        .sidebar .nav-link {
            color: #495057;
            border-radius: 8px;
            margin: 2px 10px;
            padding: 10px 14px;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link:hover {
            background-color: #f1f5ff;
            color: #0d6efd;
        }


        .sidebar .nav-link.active {
            background-color: #f8f1df;
            color: #b08d3c !important;
            font-weight: 600;
            border-left: 3px solid #b08d3c;
        }

        .sidebar .nav-link i {
            width: 22px;
            margin-right: 8px;
        }


        /* ==========================
           MAIN CONTENT
        ========================== */

        .main-content {
            min-height: calc(100vh - 57px);
        }

        .page-header {
            padding-top: 25px;
            padding-bottom: 20px;
        }


        /* ==========================
           CARDS
        ========================== */

        .card {
            border: 1px solid #e9ecef;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
        }


        /* ==========================
           FOOTER
        ========================== */

        .main-footer {
            background-color: #ffffff;
            border-top: 1px solid #e9ecef;
            color: #6c757d;
        }


        /* ==========================
           MOBILE
        ========================== */

        @media (max-width: 767.98px) {

            .sidebar {
                min-height: auto;
                border-right: none;
                border-bottom: 1px solid #e9ecef;
            }

            .main-content {
                min-height: auto;
            }

        }
    </style>
</head>

<body>

    {{-- ==========================================
         NAVBAR
    =========================================== --}}

    <nav class="navbar main-navbar sticky-top">

        <div class="container-fluid px-3 px-lg-4 justify-content-end">

            @auth

                <div class="dropdown">
                    <button
                        class="btn btn-light border dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->email }}
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-key me-2"></i>
                                Change Password
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

            @else

                <a class="btn btn-light border" href="{{ route('login') }}">Login</a>

            @endauth

        </div>

    </nav>


    {{-- ==========================================
         PAGE LAYOUT
    =========================================== --}}

    <div class="container-fluid">

        <div class="row">


            {{-- ==========================================
                 SIDEBAR
            =========================================== --}}

            @include('admin/admin-sidebar')


            {{-- ==========================================
                 MAIN CONTENT
            =========================================== --}}

            <main
                class="@auth col-md-9 ms-sm-auto col-lg-10 @else col-12 @endauth main-content px-3 px-lg-4">


                {{-- Flash Success --}}
                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">

                        <i class="bi bi-check-circle me-2"></i>

                        {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif


                {{-- Flash Error --}}
                @if(session('error'))

                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">

                        <i class="bi bi-exclamation-circle me-2"></i>

                        {{ session('error') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif


                {{-- Validation Errors --}}
                @if($errors->any())

                    <div class="alert alert-danger mt-4">

                        <strong>
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Please check the following:
                        </strong>

                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- Page Content --}}
                @yield('content')


            </main>

        </div>

    </div>


    {{-- ==========================================
         FOOTER
    =========================================== --}}

    <footer class="main-footer text-center py-3">

        <small>

            &copy; {{ date('Y') }}

            {{ config('app.name', 'Laravel') }}.

            All rights reserved.

        </small>

    </footer>


    {{-- Page-specific JavaScript --}}
    @stack('scripts')

</body>

</html>
