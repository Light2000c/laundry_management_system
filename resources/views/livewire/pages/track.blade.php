<div>
    <div class="dark-bg mb-5">
        <div class="dark-content text-center mb-5 mt-5 pb-5 pt-5">
            <h3 style="font-size: 50px;">Tracking</h3>
        </div>
    </div>


    <div class="container pt-5 pb-5 mb-5">

        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-10 col-lg-8 text-center">
                <p
                    style="font-size: 20px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                    Welcome to our Laundry Order Tracking page! Easily monitor the status of your laundry with our
                    user-friendly system. From drop-off to completion, stay informed with real-time updates on your
                    order’s status: pending, in process, and completed.</p>
            </div>
        </div>

        <div>
            <div class="row d-flex justify-content-center">
                <div class="col-10 col-lg-8">
                    <div class="row">
                        <div class="col-8 col-9 mb-3">
                            <input wire:model="keyword" type="email" class="form-control"
                                id="exampleFormControlInput1" placeholder="TRACKING ID" style="height: 50px">
                            @error('keyword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-3 col-3">
                            <div class="d-grid">
                                <button wire:click="search" class="btn btn-primary btn-lg">TRACK</button>
                                {{-- <button wire:click="pay" class="btn btn-primary">Test Payment</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <livewire:components.test />
            <livewire:components.test />
        </div>


        @if (!$laundry_lists)
            <div class="row d-flex justify-content-center mt-5 pt-5 mb-5">
                <div class="col-11 col-lg-10">
                    <div class="row g-5">
                        <div class="col-12 col-lg-4 text-center">
                            <i class="bi bi-box-arrow-in-right mb-2" style="font-size: 35px; color: #171079;"></i>
                            <h5 class="mt-2">Search</h5>
                            <p
                                style="font-size: 18px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                Enter your tracking ID to locate and view details about your specific laundry items,
                                ensuring easy retrieval upon your visit</p>
                        </div>
                        <div class="col-12 col-lg-4 text-center">
                            <i class="bi bi-clipboard-check-fill" style="font-size: 35px; color: #171079;"></i>
                            <h5 class="mt-2">Confirm Status</h5>
                            <p
                                style="font-size: 18px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                Check the current status of your laundry, including whether it is being cleaned, ready
                                for
                                pickup, or in progress</p>
                        </div>
                        <div class="col-12 col-lg-4 text-center">
                            <i class="bi bi-credit-card-fill mb-2" style="font-size: 35px; color: #171079;"></i>
                            <h5 class="mt-2">Payment</h5>
                            <p
                                style="font-size: 18px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                Complete the payment process for your laundry service to ensure your items are ready for
                                pickup when you arrive</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($laundry_lists)
            <div class="row">
                <div class="col">

                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Reference</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Paid_at</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laundry_lists as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->customer_name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->reference }}</td>
                                        <td>
                                            @if ($item->status === '2')
                                                <span class="badge text-bg-success">success</span>
                                            @elseif($item->status === '1')
                                                <span class="badge text-bg-info">In Progress</span>
                                            @else
                                                <span class="badge text-bg-danger">pending</span>
                                            @endif

                                        </td>
                                        <td>₦{{ number_format($this->getTotal($item->id)) }}</td>
                                        <td>{{ $item->paid_at }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button wire:click="openItemsModal({{ $item->id }})"
                                                    class="btn btn-outline-primary btn-sm me-2"><i
                                                        class="bi bi-eye"></i></button>
                                                <button wire:click="generateNewPdf({{ $item->id }})"
                                                    class="btn btn-outline-primary btn-sm me-2"><i
                                                        class="bi bi-printer-fill"></i></button>
                                                <button wire:click="pay({{ $item }})"
                                                    class="btn btn-outline-primary btn-sm me-2" {{ $item->paid_at? "disabled" : "" }}><i
                                                        class="bi bi-credit-card"></i> Pay</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @endif

    </div>



    <!-- Modal -->
    <div wire:ignore.self class="modal modal-lg" id="itemModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Laundry >
                        {{ $active_laundry->reference ?? '' }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <p>Customer Name: {{ $active_laundry->customer_name ?? '' }}</p>
                        <p>Customer Email: {{ $active_laundry->email ?? '' }}</p>
                        <p>Status:
                            @if ($active_laundry ? $active_laundry->status === '2' : '')
                                <span class="badge text-bg-success">Completed</span>
                            @elseif($active_laundry ? $active_laundry->status === '1' : '')
                                <span class="badge text-bg-info">In Progress</span>
                            @else
                                <span class="badge text-bg-danger">pending</span>
                            @endif
                        </p>
                        <p>Total Item: {{ $this->getItemsCount($active_laundry->id ?? '') }}</p>
                        <p>Paid At: {{ $active_laundry->paid_at ?? '' }} </p>
                        @if($this->active_payment)
                        <p>Total Amount Paid: {{ $active_payment->amount ?? '' }} </p>
                        <p>Payment Type: {{ $active_payment->type ?? '' }}</p>
                        @endif
                    </div>

                    <div>
                        <div class="table-responsive">
                            <table class="table  table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">weight</th>
                                        <th scope="col">unit Price</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($laundry_items)
                                        @foreach ($laundry_items as $item)
                                            <tr>
                                                <th scope="row">{{ $item->category_id }}</th>
                                                <td>{{ $item->laundryCategory->name }}</td>
                                                <td>{{ $item->weight }}</td>
                                                <td>{{ $item->laundryCategory->price }}</td>
                                                <td>{{ $item->weight * $item->laundryCategory->price }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row d-flex jusify-content-between">
                        <div class="col">
                            <button wire:click="generateNewPdf({{ $active_laundry->id ?? '' }})"
                                class="btn btn-outline-danger">Generate Receit</button>
                        </div>
                        <div class="col">
                            <p>Laundry ID: {{ $active_laundry->reference ?? '' }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->


    <script>
        window.addEventListener("showItems", function(e) {
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

</div>
