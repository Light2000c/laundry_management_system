<div class="container">
    <div class="mt-3 ms-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>
    </div>

    <div class="d-flex justify-content-end me-4 mt-5">
        @if (!$displayForm)
            <button wire:click="showForm" class="btn btn-outline-primary" type="button"><i class="bi bi-plus"></i> New
                user</button>
        @else
            <button wire:click="hideForm" class="btn btn-outline-primary" type="button">Close form</button>
        @endif
    </div>

    @if ($displayForm)
        <div class="card shadow border-0 m-4 p-4">
            <form wire:submit.prevent="createUser">
                <div class="form-group">

                    <div class="row">
                        <div class="col form-group mb-3">
                            <label class="mb-2" for="">Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col form-group mb-3">
                            <label class="mb-2" for="">Email</label>
                            <input type="text" wire:model="email" class="form-control">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col form-group mb-3">
                            <label class="mb-2" for="">Username</label>
                            <input type="text" wire:model="username" class="form-control">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col form-group mb-3">
                            <label class="mb-2" for="">Password</label>
                            <input type="password" wire:model="password" class="form-control">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
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
    @endif


    <div class="card shadow border-0 m-4 p-3">
        <div class="d-flex justify-content-end">
            <div class="col-lg-3 col-sm-6 d-flex">
                <input wire:model.live.debounce.150ms="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-sort-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Date</a></li>
                        <li><a class="dropdown-item" href="#">Customer Name</a></li>
                        <li><a class="dropdown-item" href="#">Satus</a></li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped table-hover" style="overflow-x: auto;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route("edit-user", $user) }}" class="btn btn-outline-primary btn-sm me-2"><i
                                        class="bi bi-pencil-square"></i></a>
                                <button wire:click="deleteUser({{$user}})" class="btn btn-outline-primary btn-sm"><i class="bi bi-trash3"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
