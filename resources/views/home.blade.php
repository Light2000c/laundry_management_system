@extends('layouts.app')


@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./Photos/cloth1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Explore</h5>
                    <p>Exploring the world</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./Photos/cloth 2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./Photos/cloth 3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">


        {{-- beginning of about section --}}
        <section class="">

            <div class="row mt-5 mb-5 g-5">
                <div class="col-12 col-lg-6 mb-2">
                    <div class="">
                        <img class="img-fluid" src="images/about-1.jpeg" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-2 align-self-center">
                    <div>
                        <h3 class="mb-2">About Us</h3>
                        <p>Welcome to Dominion Laundry Care, where innovation meets efficiency in laundry
                            services management. Our journey began with a vision to transform
                            the way laundry services are managed and delivered. From the outset, our goal has been to
                            harness the power of cutting-edge technology to bring unparalleled efficiency, convenience, and
                            quality to the laundry industry.</p>
                        <p>Our team comprises dedicated professionals from diverse backgrounds, each bringing a wealth of
                            experience and expertise to the table. </p>

                        <div>
                            <button class="btn btn-outline-primary">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- beginning of about section --}}
    </div>

    {{-- beginning of why choose us --}}
    <section>
        <div class="dark-bg2 pt-5 pb-5" style="margin-bottom: 100px; margin-top: 100px;">
            <div class="dark-content2 row justify-content-center pt-4 pb-4">

                <div class="col-sm-12 col-lg-10">
                    <div class="row g-5">
                        <div class="col-12 col-lg-6 ">
                            <h3 class="mb-5">Why Choose Us</h3>

                            <div class="row">
                                <div class="col-12 col-lg-6 mb-3">
                                    <h5><i class="bi bi-caret-right-fill" style="color: #171079;"></i> Efficiency</h5>
                                    <p>
                                        Our platform automates many of the tedious tasks involved in laundry management,
                                        saving you time and effort.
                                    </p>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <h5><i class="bi bi-caret-right-fill" style="color: #171079;"></i> Transparency</h5>
                                    <p>
                                        Track your laundry orders in real-time and receive notifications at every stage of
                                        the process.
                                    </p>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <h5><i class="bi bi-caret-right-fill" style="color: #171079;"></i> Convenience</h5>
                                    <p>
                                        From scheduling pickups and deliveries to managing payments, our platform makes
                                        every aspect of laundry care simple and convenient.
                                    </p>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <h5><i class="bi bi-caret-right-fill" style="color: #171079;"></i> Sustainability</h5>
                                    <p>
                                        We are committed to environmentally friendly practices, encouraging the use of
                                        eco-friendly detergents and energy-efficient processes.
                                    </p>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <h5><i class="bi bi-caret-right-fill" style="color: #171079;"></i> Security</h5>
                                    <p>
                                        Our platform uses advanced encryption and security protocols to ensure that your
                                        personal and payment
                                        information is always protected.
                                    </p>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <h5><i class="bi bi-caret-right-fill" style="color: #171079;"></i> Customization</h5>
                                    <p>
                                        We offer customizable options for laundry care, allowing you to specify preferences
                                        and requirements to ensure your garments are treated exactly how you want.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 align-self-center">
                            <img class="img-fluid"
                                src="https://www.love2laundry.com/blog/wp-content/uploads/2022/12/shutterstock_1899728920.jpg"
                                alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- end of why choose us --}}

    {{-- Beginning of what they say about use --}}
    <div class="container mt-5">
        <div class="row justify-content-center mb-5">
            <div class="col-sm-12 col-lg-10">

                <div class="row justify-content-center mt-5 mb-5">
                    <div class="col-lg-8 text-start text-lg-center">
                        <h6 class="text-primary">TESTIMONIALS</h6>
                        <h3 class="" style="font-size: 40px; font-weight: bolder;">Hear What Our Clients Says
                        </h3>
                    </div>
                </div>

                {{-- Beginning of carousel --}}
                <div id="carouselExampleAutoplaying" class="carousel slide  border pt-5 pb-5" data-bs-ride="carousel">
                    <div class="carousel-inner ">
                        <div class="carousel-item active">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <div class="mb-5">
                                        <i class="bi bi-quote" style="font-size: 30px;"></i>
                                    </div>
                                    <h5>Maria Smantha</h5>
                                    <p>Newyork, USA</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse architecto expedita
                                        quod qui pariatur vitae accusantium. Voluptate laboriosam, dignissimos quo quisquam,
                                        fugiat laudantium.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <div class="mb-5">
                                        <i class="bi bi-quote" style="font-size: 30px;"></i>
                                    </div>
                                    <h5>David Greg</h5>
                                    <p>London, Uk</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse architecto expedita
                                        quod qui pariatur vitae accusantium. Voluptate laboriosam, dignissimos quo quisquam,
                                        fugiat laudantium.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <div class="mb-5">
                                        <i class="bi bi-quote" style="font-size: 30px;"></i>
                                    </div>
                                    <h5>Shine Peter</h5>
                                    <p>Ontario, CANADA</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse architecto expedita
                                        quod qui pariatur vitae accusantium. Voluptate laboriosam, dignissimos quo quisquam,
                                        fugiat laudantium.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev btn-primary" type="button"
                        data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon " aria-hidden="true"></span>
                        <span class="visually-hidden ">Next</span>
                    </button>
                </div>
                {{-- End of carousel --}}
            </div>
        </div>
    </div>
    {{-- End of what they say about use --}}
@endsection
