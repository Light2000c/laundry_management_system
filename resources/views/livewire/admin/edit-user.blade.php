<div class="container">
    <div class="mt-3 ms-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
            </ol>
        </nav>
    </div>



    <div class="card shadow border-0 m-4 p-4">

        @if($message)
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <strong>Error!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

        <form wire:submit.prevent="updateUser">
            <div class="form-group">

                <div class="row mb-5">
                    <div class="col-sm-12 col-lg-6 form-group mb-3">
                        <label class="mb-2" for="">Name</label>
                        <input type="text" wire:model="name"  class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-12 col-lg-6 form-group mb-3">
                        <label class="mb-2" for="">Email</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-12 col-lg-6 form-group mb-3">
                        <label class="mb-2" for="">Username</label>
                        <input type="text" wire:model="username"  class="form-control">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <hr>


                <div class="row mt-5">
                    <div class="col form-group mb-3">
                        <label class="mb-2" for="">Current Password</label>
                        <input type="password" wire:model="current_password" class="form-control">
                        @error('current_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col form-group mb-3">
                        <label class="mb-2" for="">New Password</label>
                        <input type="password" wire:model="password" class="form-control">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col col-lg-6 form-group mb-3">
                        <label class="mb-2" for="">Confirm Password</label>
                        <input type="password" wire:model="password_confirmation" class="form-control">
                    </div>
                </div>

                <div class="col col-lg-4 d-grid">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

        </form>
    </div>



    <script>
        window.addEventListener('message', function(e) {
            // console.log("event ==>", e);
            // Swal.fire(e.detail); 

            let data = e.detail;

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: data.icon,
                title: data.title
            });

        });
    </script>

</div>
