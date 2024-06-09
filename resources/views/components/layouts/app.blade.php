<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- ionic cdn --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" /> --}}


    {{-- sweet alert cdn link --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireStyles
</head>

<body>

    <div class="">
        <div class="row flex-nowrap no-gutters g-0">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item active">
                            <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0">
                                <i class="bi bi-house-door-fill"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('laundry-list') }}" class="nav-link align-middle px-0">
                                <i class="bi bi-card-list"></i> <span class="ms-1 d-none d-sm-inline">Laundry
                                    List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('laundry-category') }}" class="nav-link align-middle px-0">
                                <i class="bi bi-card-checklist"></i> <span class="ms-1 d-none d-sm-inline">Laundry
                                    Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('supply-list') }}" class="nav-link align-middle px-0">
                                <i class="bi bi-card-list"></i> <span class="ms-1 d-none d-sm-inline">Supply
                                    List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('inventry') }}" class="nav-link align-middle px-0">
                                <i class="bi bi-house-gear-fill"></i> <span
                                    class="ms-1 d-none d-sm-inline">Inventory</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reports') }}" class="nav-link align-middle px-0">
                                <i class="bi bi-clipboard-data-fill"></i> <span
                                    class="ms-1 d-none d-sm-inline">Report</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users') }}" class="nav-link align-middle px-0">
                                <i class="bi bi-people-fill"></i> <span class="ms-1 d-none d-sm-inline">Users</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col">
                <div class="bg-light d-flex justify-content-end p-2">

                    <div class="dropdown pt-2 pb-2">
                        <a href="#"
                            class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                                class="rounded-circle">
                            @if (Auth::user())
                                <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>

                <div class="py-3">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </div>

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    {{-- ionic cdn script --}}
    {{-- <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script> --}}

    <script>
        $(document).ready(function() {
            $('#exampleModal').modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    </script>

</body>

</html>
