<div class="container">
    <div class="mt-3 ms-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laundry Category</li>
            </ol>
        </nav>
    </div>


    <div class="d-flex justify-content-end me-4 mt-5">
        @if (!$displayForm)
            <button wire:click="showForm" class="btn btn-outline-primary" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal"><i class="bi bi-plus"></i> Add Category</button>
        @else
            <button wire:click="hideForm" class="btn btn-outline-primary" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal"> Close Form</button>
        @endIf
    </div>


    @if ($displayForm)
        <div class="card shadow border-0 m-4 mb-5 p-3">
            <form wire:submit="send">
                <div class="row">
                    <div class="col-sm-12 col-lg-6 mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Category Name</label>
                        <textarea wire:model="name" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-lg-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Price per kg.</label>
                        <input wire:model="price" type="number" class="form-control" id="exampleFormControlInput1">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="d-grid col-sm-12 col-lg-3">
                    <button type="submit" class="btn btn-primary"
                        {{ $busy ? 'disabled' : '' }}>{{ $busy ? 'Processing...' : 'Submit' }}</button>
                </div>
            </form>
        </div>
    @endIf

    <div class="card shadow border-0 m-4 p-3">
        <div class="d-flex justify-content-end">
            <div class="col-lg-3 col-sm-6 d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-sort-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Name</a></li>
                        <li><a class="dropdown-item" href="#">Price</a></li>
                        <li><a class="dropdown-item" href="#">Date</a></li>
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
                        <th scope="col">Price</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laundryCategories as $laundryCategory)
                        <tr>
                            <th scope="row">{{ $laundryCategory->id }}</th>
                            <td>{{ $laundryCategory->name }}</td>
                            <td>{{ number_format($laundryCategory->price) }}</td>
                            <td>{{ $laundryCategory->created_at }}</td>
                            <td>
                                <div class="d-flex">
                                    <button wire:click="openUpdateModal({{ $laundryCategory->id }})" class="btn btn-outline-primary btn-sm me-2"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button wire:click="deleteCategory({{ $laundryCategory }})" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Laundry Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <form wire:submit.prevent="updateLaundryCategory" method="post">
                            <div class="form-group">


                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Category Name</label>
                                    <input wire:model="name" type="text" class="form-control">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Price</label>
                                    <input wire:model="price" type="number" class="form-control">
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" {{ $busy ? 'disabled' : '' }}>
                                        {{ $busy ? 'Processing...' : 'Save Changes' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <script>
        window.addEventListener('closeUpdateModal', function(e){
            $("#updateModal").modal("hide");
        });

        window.addEventListener('updateModal', function(e){
            $("#updateModal").modal("show");
        });

        window.addEventListener('message', function(e) {
            // console.log("event ==>", e);

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
