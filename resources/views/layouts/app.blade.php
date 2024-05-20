<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/main.css">
    <title>Home</title>
    <style>
        /* Basic CSS for navigation bar */
        nav {
            background-color: #171079;
            width: 100%;

            text-align: right;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            display: inline-block;
        }

        nav a {
            display: inline-block;
            padding: 50px 20px;
            text-decoration: none;
            color: white;
        }

        nav a:hover {
            background-color: #9a8105;
        }

        .logo1 img {
            height: 100px;
            width: 100px;
            position: absolute;
            top: 18px;
            left: 90px;

        }

        .logotoo h2 {
            position: absolute;
            color: white;
            left: 240px;
            top: 40px;
        }

        /* slider*/


        body {
            margin: 0;
            padding: 0;
        }

        .footer {
            background-color: #f2f2f2;
            padding: 1rem 2rem;
            text-align: center;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .copyright,
        .footer-nav {
            flex: 1;
        }

        .copyright {
            font-size: 0.8rem;
            color: #aaa;
        }

        .footer-nav {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .footer-nav a {
            text-decoration: none;
            color: #333;
            margin: 0 1rem;
        }

        .footer-nav a:hover {
            color: #000;
        }

        .back-to-top {
            display: none;
            color: #333;
            font-weight: bold;
        }

        /* Responsive Styles (optional) */

        @media (max-width: 768px) {
            .footer-content {
                flex-direction: column;
                align-items: center;
            }

            .copyright,
            .footer-nav {
                flex: auto;
                margin-bottom: 1rem;
            }
        }
    </style>
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


    @yield('content')



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

    <footer class="footer">
        <div class="footer-content">
            <div class="row">
                <div class="col">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum quasi dicta quos odio cum, ea
                    praesentium veritatis ipsa.
                </div>
                <div class="col">
                    <div class="">
                        <h5>Quick Links</h5>
                        <p>Home</p>
                        <p>About</p>
                        <p>Contact</p>
                        <p>Services</p>
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <h5>Others</h5>
                        <p>Faq</p>
                        <p>Price List</p>
                        <p>Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>










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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
