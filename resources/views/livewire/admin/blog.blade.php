<div class="container">
    <div class="mt-3 ms-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>
    </div>

    <div class="d-flex justify-content-end me-4 mt-5">
        <button class="btn btn-outline-primary" type="button" wire:click="openCreateModal"> Add Blog Post</button>
    </div>


    <div class="card shadow border-0 m-4 p-3">
        <div class="row d-flex justify-content-end">
            <div class="col-11 col-lg-3 d-flex">
                <input wire:model.live.debounce.150ms="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
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

        <div class="row">
            <div class="col">
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped table-hover" style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created_by</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $blog->id }}</th>
                                    <td>{{ Str::words($blog->title, 7) }}</td>
                                    <td>{!! Str::words($blog->description, 10) !!}</td>
                                    <td><img class="img-fluid" src="/storage/blog_images/{{ $blog->image }}"
                                            alt="No image" srcset="" width="50px" height="50px"></td>
                                    <td>{{ $blog->user->name }}</td>
                                    <td>{{ $blog->created_at }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button wire:click="openUpdateModal({{ $blog->id }})"
                                                class="btn btn-outline-primary btn-sm me-2"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button wire:click="delete({{ $blog }})"
                                                class="btn btn-outline-danger btn-sm"><i
                                                    class="bi bi-trash3"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{  $blogs->withQueryString()->links() }}
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div wire:ignore.self class="modal modal-lg fade" id="createModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Laundry Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <form wire:submit.prevent="send" method="post">
                            <div class="form-group">



                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Title</label>
                                    <input wire:model="title" type="text" class="form-control">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Title</label>
                                    <input wire:model="image" type="file" class="form-control">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Description</label>
                                    <textarea wire:model="description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" {{ $busy ? 'disabled' : '' }}>
                                        {{ $busy ? 'Processing...' : 'Add Post' }}
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


    <!-- Modal -->
    <div wire:ignore.self class="modal modal-lg fade" id="updateModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Laundry Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <form wire:submit.prevent="update" method="post">
                            <div class="form-group">


                                <div class="row mb-3">
                                    <div class="col-4">
                                        <img class="img-fluid" src="/storage/blog_images/{{ $image }}"
                                            alt="No image" srcset="">
                                    </div>
                                </div>

                                <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                                    <label
                                        class="btn {{ $toggle == 'option1' ? 'btn-primary active' : 'btn-secondary' }}">
                                        <input wire:change="updateToggle('option1')" type="radio" wire:model="toggle" id="option1" value="option1"
                                            autocomplete="off" checked> Image
                                    </label>
                                    <label
                                        class="btn {{ $toggle == 'option2' ? 'btn-primary active' : 'btn-secondary' }}">
                                        <input wire:change="updateToggle('option2')" type="radio" wire:model="toggle" id="option2" value="option2"
                                            autocomplete="off"> No Image
                                    </label>
                                </div>

                                @if($toggle == "option1")
                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">image</label>
                                    <input wire:model="image" type="file" class="form-control">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                @endif

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Title</label>
                                    <input wire:model="title" type="text" class="form-control">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Description</label>
                                    <textarea wire:model="description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    @error('description')
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
        window.addEventListener("createModal", function(e) {
            $("#createModal").modal("show");
        });

        window.addEventListener("closeCreateModal", function(e) {
            $("#createModal").modal("hide");
        });

        window.addEventListener("updateModal", function(e) {
            $("#updateModal").modal("show");
        });

        window.addEventListener("closeUpdateModal", function(e) {
            $("#updateModal").modal("hide");
        });


        window.addEventListener('message', function(e) {

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
