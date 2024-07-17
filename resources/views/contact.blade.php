@extends('layouts.app')


@section('content')
    <div class="dark-bg mb-5">
        <div class="dark-content text-center mb-5 mt-5 pb-5 pt-5">
            <h3 style="font-size: 50px;">Contact Us</h3>
        </div>
    </div>

    <div class="container mt-5 mb-5 pt-5 pb-5">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-lg-6 align-self-center mb-3 location-item">
                <h2 style="font-size: 50px; font-weight: bold;">Contact Us</h2>
                <p class="mb-5">
                    We'd love to hear from you! Whether you have questions, feedback, or just want to say hello, feel free
                    to reach out. Our team is here to help and will get back to you as soon as possible.
                </p>

                <p><i class="bi bi-geo-alt-fill me-2"></i>Lagos - Ibadan Expy, Olonde/Aba-Nla 110108, Oyo</p>
                <p><a href="mail:support@dominionlaundrycare.com"><i class="bi bi-envelope-at-fill me-2"></i>support@dominionlaundrycare.com</a></p>
                <p><a href=""><i class="bi bi-telephone-fill me-2"></i>+2347042125514</a></p>
                <p><a href=""><i class="bi bi-clock-fill me-2"></i>08:00am - 05:00pm</a></p>

            </div>
            <div class="col-12 col-lg-6 mb-3">
                <div class="card shadow border-0">
                    <form action="{{ route('contact') }}" method="post">
                        @csrf

                        @if(session("success"))
                        <div class="alert alert-success m-2" role="alert">
                            {{ session("success") }}
                          </div>
                          @endif

                        <div class="form-group p-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                <input name="fullname" type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Enter Your Full Name">
                                @error('fullname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Subject</label>
                                <input name="subject" type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Subject">
                                @error('subject')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button class="btn" style="background-color: #171079; color: #ffffff">Send
                                    Message</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div><iframe width="1200" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        id="gmap_canvas"
                        src="https://maps.google.com/maps?width=1200&amp;height=400&amp;hl=en&amp;q=%20Ibeju%20Lekki+(Dominion%20LAundry)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    <a href='https://www.krankenversicherungsvergleich.at/'>Krankenversicherung Rechner</a>
                    <script type='text/javascript'
                        src='https://embedmaps.com/google-maps-authorization/script.js?id=8fbe8183353981fd2b7e355d82499dbe1dc7dea1'>
                    </script>
                </div>
            </div>
        </div>



    </div>

    <script>
        window.addEventListener("listItems", function(e) {
            $("#itemModal").modal("show");
        });


        window.addEventListener("message", function(e) {

            let data = e.detail;

            console.log(data);

            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.icon,
            });

        });
    </script>
@endsection
