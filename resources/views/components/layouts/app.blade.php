<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dominion Laundry Care</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    {{-- sweet alert cdn link --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">

    @livewireStyles
</head>

<body>
    <div class="container-fluid">
        <div class="row no-gutters vh-100">
            <div class="col-sm-auto  px-sm-2 px-0 bg-dark  sticky-top ">
                {{-- <div class="col-sm-auto bg-light  sticky-top"> --}}
                <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                    <a href="/" class="d-block p-3 link-light text-decoration-none logo" title=""
                        data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                        {{-- <i class="bi-bootstrap fs-1"></i> --}}
                        <img src="../Photos/Dominion university logo 2.png" alt="" width="50px" height="50px">
                    </a>
                    <ul
                        class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center  align-items-lg-start">

                        <li class="">
                            <a href="{{ route('dashboard') }}" class="nav-link py-3 px-2" data-bs-toggle="tooltip"
                                data-bs-placement="right">
                                <i class="bi bi-house-door-fill fs-5"></i>
                                <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('laundry-list') }}" class="nav-link py-3 px-2" data-bs-toggle="tooltip"
                                data-bs-placement="right">
                                <i class="bi bi-card-list fs-5"></i>
                                <span class="ms-1 d-none d-sm-inline">Laundry List</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('laundry-category') }}" class="nav-link py-3 px-2" data-bs-toggle="tooltip"
                                data-bs-placement="right">
                                <i class="bi bi-menu-button-wide fs-5"></i> <span
                                    class="ms-1 d-none d-sm-inline">Laundry
                                    Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('supply-list') }}" class="nav-link py-3 px-2" data-bs-toggle="tooltip"
                                data-bs-placement="right">
                                <i class="bi bi-journal-arrow-down fs-5"></i> <span
                                    class="ms-1 d-none d-sm-inline">Supply
                                    List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('inventry') }}" class="nav-link py-3 px-2" data-bs-toggle="tooltip"
                                data-bs-placement="right">
                                <i class="bi bi-journals fs-5"></i> <span
                                    class="ms-1 d-none d-sm-inline">Inventory</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('payment') }}" class="nav-link py-3 px-2" data-bs-toggle="tooltip"
                                data-bs-placement="right">
                                <i class="bi bi-credit-card-fill fs-5"></i> <span
                                    class="ms-1 d-none d-sm-inline">Payments</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin-blog') }}" class="nav-link py-3 px-2" data-bs-toggle="tooltip"
                                data-bs-placement="right">
                                <i class="bi bi-megaphone fs-5"></i> <span class="ms-1 d-none d-sm-inline">Blog</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('reports') }}" class="nav-link py-3 px-2" data-bs-toggle="tooltip"
                                data-bs-placement="right">
                                <i class="bi bi-clipboard-data-fill fs-5"></i> <span
                                    class="ms-1 d-none d-sm-inline">Report</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users') }}" class="nav-link py-3 px-2" data-bs-toggle="tooltip"
                                data-bs-placement="right">
                                <i class="bi bi-people-fill fs-5"></i> <span
                                    class="ms-1 d-none d-sm-inline">Users</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- <div class="col-sm p-3 min-vh-100">
                <!-- content -->
            </div> --}}
            <div class="col px-0">
                <div class="bg-light d-flex justify-content-end p-2">
                    <livewire:components.dropdown />
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
