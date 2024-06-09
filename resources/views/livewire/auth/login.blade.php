<div class="">



    <div class="row d-flex justify-content-center mt-5">
        <div class="col-11 col-lg-3">
            <div class="card shadow border-0 p-4 mt-5">

                {{-- <h5 class="text-center" style="font-weight: bold;">Login to Continue</h5> --}}
                <div class="d-flex justify-content-center mb-3">
                    <img src="./Photos/Dominion university logo 2.png" class="img-thumbnail border-0" alt=""
                        width="100px" width="">
                </div>

                @if ($message)
                    <div class="alert alert-danger alert-dismissible fade show mb-3 mt-3" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endIf


                <form wire:submit.prevent="login">
                    <div class="form-group mt-3 mb-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                            <input type="text" wire:model="username" class="form-control" id="exampleFormControlInput1"
                                placeholder="Username">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" wire:model="password" class="form-control" id="exampleFormControlInput2"
                                placeholder="Enter your password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
                            <button type="submit" class="btn"
                                style="background-color: #171079; color: #ffffff" {{ $busy? 'disabled' : '' }}> {{ $busy? 'Processing...' : 'Login' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
