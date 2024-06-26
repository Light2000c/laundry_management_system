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

    <link rel="stylesheet" href="css/main.css">

    <title>Home</title>

    @livewireStyles
</head>

<body>

    <div class="bar1">
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="./Laundryaboutus.html">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Calculator</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Order</a></li>
            </ul>
        </nav>

    </div>

    <div class="logo1">
        <img src="./Photos/Dominion university logo 2.png" alt="">
    </div>
    <div class="logotoo">
        <h2>
            Dominion Laundry Care
        </h2>
    </div>

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
