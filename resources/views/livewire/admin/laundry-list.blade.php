<div class="container">
    <div class="mt-3 ms-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laundry List</li>
            </ol>
        </nav>
    </div>

    <div class="d-flex justify-content-end me-4 mt-5">
        <button wire:click="openCreateModal()" class="btn btn-outline-primary" type="button"><i class="bi bi-plus"></i>
            New Laundry</button>
    </div>

    <div class="card shadow border-0 m-4 p-3">
        <div class="d-flex justify-content-end">
            <div class="col-lg-3 col-sm-6 d-flex">
                <input wire:model.live.debounce.150ms="search" class="form-control me-2" type="search"
                    placeholder="Search" aria-label="Search">
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
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Reference</th>
                        <th scope="col">Total Bill</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laundry_lists as $list_item)
                        <tr>
                            <th scope="row">{{ $list_item->id }}</th>
                            <td>{{ $list_item->customer_name }}</td>
                            <td>{{ $list_item->email }}</td>
                            <td>{{ $list_item->created_at }}</td>
                            <td>{{ $list_item->reference }}</td>
                            <td>₦{{ number_format($this->getTotal($list_item->id)) }}</td>
                            <td>
                                @if ($list_item->status === '2')
                                    <span class="badge text-bg-success">completed</span>
                                @elseif($list_item->status === '1')
                                    <span class="badge text-bg-info">In Progress</span>
                                @else
                                    <span class="badge text-bg-danger">pending</span>
                                @endif

                            </td>
                            <td>
                                <div class="d-flex">
                                    <button wire:click="openUpdateModal({{ $list_item->id }})"
                                        class="btn btn-outline-primary btn-sm me-2"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button wire:click="generateNewPdf({{ $list_item->id }})"
                                        class="btn btn-outline-primary btn-sm me-2"><i
                                            class="bi bi-printer-fill"></i></button>
                                    <button wire:click="deleteLaundry({{ $list_item->id }})"
                                        class="btn btn-outline-primary btn-sm"><i class="bi bi-trash3"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $laundry_lists->withQueryString()->links() }}
    </div>


    <!-- Create Modal -->
    <div wire:ignore.self class="modal fade modal-lg" id="createModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Laundry</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        @if ($errorMessage)
                            <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                {{ $errorMessage }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @enderror

                        <div class="col-sm-6 col-lg-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Customer Name</label>
                            <input wire:model="customer_name" type="text" class="form-control"
                                id="exampleFormControlInput1" placeholder="Name">
                            @error('customer_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Customer Email</label>
                            <input wire:model="email" type="email" class="form-control"
                                id="exampleFormControlInput1" placeholder="name@example.com">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Remark (optional)</label>
                            <textarea wire:model="remark" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('remark')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-4 col-lg-4 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Laundry Category</label>
                                <select wire:model="category_id" class="form-control" id="">
                                    <option value="" selected>-- select --</option>
                                    @foreach ($laundry_categories as $laundry_category)
                                        <option value="{{ $laundry_category->id }}">{{ $laundry_category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-4 col-lg-4 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Weight</label>
                                <input wire:model="weight" type="number" value="0" class="form-control"
                                    id="exampleFormControlInput1">
                                @error('weight')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <button wire:click="addToLaundryItem" wire:loading.remove class="btn btn-primary"
                                    style="margin-top: 30px;"><i class="bi bi-plus"></i>
                                    Add to List</button>
                                <button wire:loading wire:target="addToLaundryItem" class="btn btn-primary"
                                    style="margin-top: 30px;" disabled><i class="bi bi-plus"></i>
                                    processing....</button>
                            </div>
                        </div>

                        <hr>

                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Category</th>
                                        <th scope="col">Weight(kg)</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laundry_items as $item)
                                        <tr>
                                            <td>{{ $this->getlaundryItemName($item['category_id']) }}</td>
                                            {{-- <td>{{ $item['weight'] }}</td> --}}
                                            <td>
                                                <div class=""
                                                    style="display: flex; flex-direction: column;">
                                                    <input wire:model="weights.{{ $item['category_id'] }}"
                                                        wire:change="updateWeight({{ $item['category_id'] }}, $event.target.value )"
                                                        type="number">
                                                    @error('weights.' . $item['category_id'])
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td>{{ $this->getlaundryItemPrice($item['category_id']) }}</td>
                                            <td>{{ $this->getlaundryItemPrice($item['category_id']) * $item['weight'] }}
                                            </td>
                                            <td>
                                                <button wire:click="deleteLaundryItem({{ $item['category_id'] }})"
                                                    class="btn btn-outline-primary btn-sm"><i
                                                        class="bi bi-trash3"></i></button>
                        </div>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>

                {{-- <hr>

                        <div class="row mt-3">
                            <div class="col-sm-6 col-lg-6 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Amount Tendered</label>
                                <input type="number" value="0" class="form-control"
                                    id="exampleFormControlInput1">
                            </div>
                            <div class="col-sm-6 col-lg-6 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Total Tendered</label>
                                <input type="number" value="0" class="form-control"
                                    id="exampleFormControlInput1">
                            </div>
                            <div class="col-sm-6 col-lg-6 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Change</label>
                                <input type="number" class="form-control"
                                    id="exampleFormControlInput1" disabled>
                            </div>
                        </div> --}}
            </div>
        </div>
        <div class="modal-footer">
            <button wire:click="send" wire:loading.remove type="button"
                class="btn btn-primary">Save</button>
            <button class="btn btn-primary" wire:loading  wire:target="send" type="button" disabled>Processing...</button>
        </div>
    </div>
</div>
</div>
<!-- Create Modal -->


<!-- Update Modal -->
<div wire:ignore.self class="modal fade modal-lg" id="updateModal" tabindex="-1"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Laundry</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="p-3">
                @if ($errorMessage)
                    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                        {{ $errorMessage }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @enderror

                <div class="row">
                    <div class="col-sm-6 col-lg-4 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Customer Name</label>
                        <input wire:model="customer_name" type="text" class="form-control"
                            id="exampleFormControlInput1" placeholder="Name">
                        @error('customer_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                        <select wire:model="status" class="form-control" id="">
                            <option value="0">Pending</option>
                            <option value="1">In Progress</option>
                            <option value="2">completed</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Customer Email</label>
                    <input wire:model="email" type="email" class="form-control"
                        id="exampleFormControlInput1" placeholder="name@example.com">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-6 col-lg-4 mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Remark</label>
                    <textarea wire:model="remark" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    @error('remark')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mt-4 mb-4">
                    @if ($paid)
                        <div class="row">
                            <div class="col-12 col-lg-4">Current Total: {{ $this->laundry_total }}</div>
                            <div class="col-12 col-lg-4">Recent Total: {{ $paid->amount }} </div>
                            <div class="col-12 col-lg-4"><button
                                    wire:click="updateLaundryPrice({{ $this->laundry_total }}, {{ $paid->id }})"
                                    class="btn btn-outline-primary">Update Price</button></div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-12 col-lg-4">Current Total: {{ $this->laundry_total }}</div>
                            <div class="col-12 col-lg-4">
                                <button
                                    wire:click="updateLaundryPrice({{ $this->laundry_total }})" wire:loading.remove
                                    class="btn btn-outline-primary">Update Price</button>
                                <button
                                    wire:loading wire:target="updateLaundryPrice({{ $this->laundry_total }})"
                                    class="btn btn-outline-primary" disabled>Update Price</button>
                            </div>
                        </div>
                    @endif
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-4 col-lg-4 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Laundry Category</label>
                        <select wire:model="category_id" class="form-control" id="">
                            <option value="" selected>-- select --</option>
                            @foreach ($laundry_categories as $laundry_category)
                                <option value="{{ $laundry_category->id }}">{{ $laundry_category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-4 col-lg-4 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Weight</label>
                        <input wire:model="weight" type="number" value="0" class="form-control"
                            id="exampleFormControlInput1">
                        @error('weight')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-4 col-lg-4">
                        <button wire:click="addToLaundryItem" wire:loading.remove class="btn btn-primary"
                            style="margin-top: 30px;"><i class="bi bi-plus"></i>
                            Add to List</button>
                        <button wire:loading wire:target="addToLaundryItem"  class="btn btn-primary"
                            style="margin-top: 30px;" disabled><i class="bi bi-plus"></i>Processing...</button>
                    </div>
                </div>

                <hr>

                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Weight(kg)</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laundry_items as $item)
                                <tr>
                                    <td>{{ $this->getlaundryItemName($item['category_id']) }}</td>
                                    {{-- <td>{{ $item['weight'] }}</td> --}}
                                    <td>
                                        <div class="" style="display: flex; flex-direction: column;">
                                            <input wire:model="weights.{{ $item['category_id'] }}"
                                                wire:change="updateWeight({{ $item['category_id'] }}, $event.target.value )"
                                                type="number">
                                            @error('weights.' . $item['category_id'])
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>{{ $this->getlaundryItemPrice($item['category_id']) }}</td>
                                    <td>{{ $this->getlaundryItemPrice($item['category_id']) * $item['weight'] }}
                                    </td>
                                    <td>
                                        <button wire:click="deleteLaundryItem({{ $item['category_id'] }})"
                                            class="btn btn-outline-primary btn-sm"><i
                                                class="bi bi-trash3"></i></button>
                </div>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>

    </div>
</div>
<div class="modal-footer">
    <button wire:click="updateLaundry" wire:loading.remove type="button"
        class="btn btn-primary">Save</button>
    <button wire:loading wire:target="updateLaundry" type="button"
        class="btn btn-primary" disabled>Processing...</button>
</div>
</div>
</div>
</div>
<!-- Update Modal -->

<script>
    window.addEventListener("createModal", function(e) {
        $("#createModal").modal("show");
    });

    window.addEventListener("closeCreateModal", function(e) {
        $("#createModal").modal("hide");
    });


    window.addEventListener('updateModal', function(e) {
        $("#updateModal").modal("show");
    });

    window.addEventListener('closeUpdateModal', function(e) {
        $("#updateModal").modal("hide");
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
