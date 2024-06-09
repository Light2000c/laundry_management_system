<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Document</title>

    <link rel="stylesheet" href="css/auth.css">
</head>

<body>

    <div class="">



        <div class="row d-flex justify-content-center mt-5">
            <div class="col-11 col-lg-3">
                <div class="card shadow border-0 p-4 mt-5">

                    {{-- <h5 class="text-center" style="font-weight: bold;">Login to Continue</h5> --}}
                    <div class="d-flex justify-content-center mb-3">
                        <img src="./Photos/Dominion university logo 2.png" class="img-thumbnail border-0" alt=""
                            width="100px" width="">
                    </div>
                    <form action="">
                        <div class="form-group mt-3 mb-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Enter your password">
                            </div>

                            {{-- <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-at-fill"></i></span>
                                <input type="email" class="form-control" placeholder="name@example.com" aria-label="Username" aria-describedby="basic-addon1">
                              </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                <input type="password" class="form-control" placeholder="Enter Your Password" aria-label="Username" aria-describedby="basic-addon1">
                              </div> --}}

                            <div class="mb-3 text-end">
                                <a href="" style="text-decoration: none; font-weight: bold;">Forget Password?</a>
                            </div>

                            <div class="d-grid">
                                <button class="btn" style="background-color: #171079; color: #ffffff">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
