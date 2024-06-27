<div class="container">
    <div class="mt-3 ms-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Supply List</li>
            </ol>
        </nav>
    </div>


    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="card shadow border-0 m-4 mb-5 p-3">
                <div class="card-header">
                    Laundry Supply Form
                </div>

                <form wire:submit="send" method="post">
                    <div class="form-group mt-4 mb-4">
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1" class="form-label">* Supply Name</label>
                            <textarea wire:model="name" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-outline-primary" {{ $busy? 'disabled' : '' }}>{{ $busy? 'processing...' : 'submit' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-lg-8">
            <div class="card shadow border-0 m-4 p-3">
                <div class="d-flex justify-content-end">
                    <div class="col-6 col-lg-4 d-flex">
                        <input wire:model.live.debounce.150ms="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-sort-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Name</a></li>
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
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supplies as $supply)
                            <tr>
                                <th scope="row">{{ $supply->id }}</th>
                                <td>{{ $supply->name }}</td>
                                <td>{{ $supply->created_at }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button wire:click="isUpdate({{ $supply }})" class="btn btn-outline-primary btn-sm me-2"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button wire:click="delete({{ $supply }})" class="btn btn-outline-danger btn-sm"><i
                                                class="bi bi-trash3"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{  $supplies->withQueryString()->links() }}
            </div>
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
