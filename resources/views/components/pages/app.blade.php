<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- sweet alert cdn link --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="/css/main.css">

    <title>Home</title>

    @livewireStyles
</head>

<body>
    <div>
        <div class="d-flex justify-content-end bg-light pt-2 pb-2">
            <marquee class="display" scrolldelay="200" behavior="" direction="left">
                <a class="me-3">Welcome to Dominion laundry Care</a>
                <a class="me-3" href=""><i class="bi bi-envelope-at-fill me-1"></i>
                    example@dominionluandry.com</a>
                <a class="me-3" href=""><i class="bi bi-telephone-fill me-1"></i> +234 815 345 3456</a>
            </marquee>
        </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-light  shadow-sm p-sm-4">
        <div class="container">
            <a class="navbar-brand" style="font-size: bolder;" href="{{ url('/') }}">
                <div class="logo1">
                    <img src="../Photos/Dominion university logo 2.png" alt="">
                </div>
            </a>
            <button class="navbar-toggler bg-light border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto mt-3">
                    <li class="nav-item active">
                        <a class="nav-link" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Faq</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Tracking</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{ $slot }}



    {{-- <footer class="footer">
        <div class="footer-content">
            <div class="copyright">
                &copy; <?php echo date('Y'); ?> Your Company Name
            </div>
            <nav class="footer-nav">
                <a href="#">About Us</a>
                <a href="#">Contact</a>
                <a href="#">Terms & Conditions</a>
            </nav>
            <a href="#" class="back-to-top">Back to Top</a>
        </div>
    </footer> --}}

    <footer class="">
        <div class="p-4 mb-5 text-white" style="background-color: #171079;">
            <span><a href="" class="text-light"><i class="bi bi-instagram me-2"></i></a></span>
            <span><a href="" class="text-light"><i class="bi bi-twitter me-2"></i></a></span>
            <span><a href="" class="text-light"><i class="bi bi-facebook me-2"></i></a></span>
            <span><a href="" class="text-light"><i class="bi bi-whatsapp me-2"></i></a></span>
        </div>
        <div class="p-4">
            <div class="row">
                <div class="col-sm-12 col-lg-4 mb-3">
                    <div>
                        <h2 class="font-weight-bold" style="color: #171079; font-weight: bold;">
                            Dominion Laundry Care
                        </h2>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum quasi dicta quos odio cum,
                            ea
                            praesentium veritatis ipsa. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam
                            et
                            illum commodi.</p>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4 d-flex justify-content-start justify-content-lg-center mb-4">
                    <div class="text-start text-lg-center footer-item">
                        <h5 class="font-weight-bold">Quick Links</h5>
                        <p><a href="">Home</a></p>
                        <p><a href="">About</a></p>
                        <p><a href="">Contact</a></p>
                        <p><a href="">Services</a></p>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4 d-flex justify-content-start justify-content-lg-center mb-4">
                    <div class="text-start text-lg-center footer-item">
                        <h5 class="font-weight-bold">More</h5>
                        <p><a href="">Developer</a></p>
                        <p><a href="">Price List</a></p>
                        <p><a href="">Faq</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 text-white" style="background-color: #171079;">
            <div>
                &copy; <?php echo date('Y'); ?> Dominion Laundry Care
            </div>
        </div>
    </footer>


    @livewireScripts

    <script>
        const backToTopBtn = document.querySelector('.back-to-top');

        window.addEventListener('scroll', () => {
            const scrollPosition = window.scrollY;

            if (scrollPosition > 300) {
                backToTopBtn.style.display = 'block';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
</body>

</html>
