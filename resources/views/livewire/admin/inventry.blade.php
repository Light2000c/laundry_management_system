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

    <div class="d-flex justify-content-end me-4 mt-5">
        <button class="btn btn-outline-primary" type="button" wire:click="openCreateModal"> Manage Supply</button>
    </div>



    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="card shadow border-0 m-4 p-3">
                <div class="d-flex justify-content-end">
                    <div class="col-lg-10 col-sm-10 d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </div>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped table-hover" style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Supply Name</th>
                                <th scope="col">Stock Available</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplies as $supply)
                                <tr>
                                    <th scope="row">{{ $supply->id }}</th>
                                    <td>{{ $supply->name }}</td>
                                    <td class="text-end">{{ $supply->availableSupply($supply->id) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-8">
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
                                <th scope="col">Date</th>
                                <th scope="col">Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventries as $inventry)
                                <tr>
                                    <th scope="row">{{ $inventry->id }}</th>
                                    <td>{{ $inventry->created_at }}</td>
                                    <td>{{ $inventry->supplyList->name }}</td>
                                    <td>{{ $inventry->quantity }}</td>
                                    <td>
                                        @if ($inventry->type === 'in')
                                            <span class="badge text-bg-primary">{{ $inventry->type }}</span>
                                    </td>
                                @else
                                    <span class="badge text-bg-danger">{{ $inventry->type }}</span></td>
                            @endif
                            <td>
                                <div class="d-flex">
                                    <button wire:click="openUpdateModal({{ $inventry->id }})"
                                        class="btn btn-outline-primary btn-sm me-2"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button wire:click="deleteInventry({{ $inventry->id }})" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Manage Supply</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="p-3">
                        <form wire:submit.prevent="send" method="post">
                            <div class="form-group">
                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Supply Name</label>
                                    <select wire:model="supply_list_id" class="form-control" id="">
                                        <option value="" selected>Select supply name</option>
                                        @foreach ($supplies as $supply)
                                            <option value="{{ $supply->id }}">{{ $supply->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supply_list_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Qty</label>
                                    <input wire:model="quantity" type="number" class="form-control">
                                    @error('quantity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Type</label>
                                    <select wire:model="type" class="form-control" name="" id="">
                                        <option value="" selected>Select type</option>
                                        <option value="in">In</option>
                                        <option value="used">Used</option>
                                    </select>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary"
                                        {{ $busy ? 'disabled' : '' }}>{{ $busy ? 'Procesing...' : 'Save' }}</button>
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
    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Manage Supply</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <form wire:submit.prevent="updateInventry" method="post">
                            <div class="form-group">
                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Supply Name</label>
                                    <select wire:model="supply_list_id" class="form-control">
                                        <option>Select supply name</option>
                                        @foreach ($supplies as $supply)
                                            <option value="{{ $supply->id }}"
                                                {{ $supply_list_id == $supply->id ? 'selected' : '' }}>
                                                {{ $supply->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('supply_list_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Qty</label>
                                    <input wire:model="quantity" type="number" class="form-control">
                                    @error('quantity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Type</label>
                                    <select wire:model="type" class="form-control">
                                        <option value="in" {{ $type == 'in' ? 'selected' : '' }}>In</option>
                                        <option value="used" {{ $type == 'used' ? 'selected' : '' }}>Used</option>
                                    </select>
                                    @error('type')
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
        window.addEventListener('showCreateModal', function(e) {
            $('#createModal').modal('show');

        });
    </script>
    <script>
        window.addEventListener('closeCreateInventory', function(e) {
            $('#createModal').modal('hide');

        });
    </script>

    <script>
        window.addEventListener('showUpdateModal', event => {
            $('#updateModal').modal('show');
        });
    </script>

    <script>
        window.addEventListener('closeUpdateModal', event => {
            $('#updateModal').modal('hide');
        });
    </script>

    <script>
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
