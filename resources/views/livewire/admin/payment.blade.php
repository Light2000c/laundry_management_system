<div class="container">
    <div class="mt-3 ms-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment</li>
            </ol>
        </nav>
    </div>

    {{-- <div class="d-flex justify-content-end me-4 mt-5">
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                class="bi bi-plus"></i> New Laundry</button>
    </div> --}}

    <div class="card shadow border-0 m-4 p-3">

        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped table-hover" style="overflow-x: auto;">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Laundry ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Type</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->laundry_list_id }}</td>
                        <td>{{ $payment->laundryList->customer_name }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->type }}</td>
                        <td>{{ $payment->created_at }}</td>
                        <td>{{ $payment->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{  $payments->withQueryString()->links() }}
    </div>


</div>
