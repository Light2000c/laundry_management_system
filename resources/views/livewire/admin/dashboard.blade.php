<div class="container">
    <div class="mt-3 ms-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </nav>
    </div>

    <div class="m-4">
        <div class="row">
            <div class="col-sm-6 col-lg-4 mb-5">
                <div class="card shadow border-0 bg-light">
                    <div class="mt-3 ms-3 d-flex justify-content-between">
                        <h6 style="font-weight: bold;">LAUNDRIES</h6>
                        <i class="bi bi-mortarboard-fill h3 me-3"></i>
                    </div>
                    <hr class="ms-3 me-3">
                    <div class="card-body text-start">
                        <p style="font-size: 18px">{{ $laundries->count() }}</p>
                    </div>
                    <div class="text-end ms-2 me-2 mb-2">
                        <a class="" style="text-decoration: none;" href="{{ route("laundry-list") }}">view</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-5">
                <div class="card shadow border-0 bg-light">
                    <div class="mt-3 ms-3 d-flex  justify-content-between">
                        <h6 style="font-weight: bold;">USERS</h6>
                        <i class="bi bi-people-fill h3 me-3"></i>
                    </div>
                    <hr class="ms-3 me-3">
                    <div class="card-body text-start">
                        <p style="font-size: 18px">{{ $users->count() }}</p>
                    </div>
                    <div class="text-end ms-2 me-2 mb-2">
                        <a class="" style="text-decoration: none;" href="{{ route("users") }}">view </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-5">
                <div class="card shadow border-0 bg-light">
                    <div class="mt-3 ms-3  d-flex  justify-content-between">
                        <h6 style="font-weight: bold;">SUPPLIES</h6>
                        <i class="bi bi-plugin h3 me-3"></i>
                    </div>
                    <hr class="ms-3 me-3">
                    <div class="card-body text-start">
                        <p style="font-size: 18px">{{ $supplies->count() }}</p>
                    </div>
                    <div class="text-end ms-2 me-2 mb-2">
                        <a class="" style="text-decoration: none;" href="{{ route("supply-list") }}">view</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-5">
                <div class="card shadow border-0 bg-light">
                    <div class="mt-3 ms-3">
                        <h6 style="font-weight: bold;">TODAY'S CUSTOMER</h6>
                    </div>
                    <hr class="ms-3 me-3">
                    <div class="card-body text-start">
                        <p style="font-size: 18px">{{ $customers->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-5">
                <div class="card shadow border-0 bg-light">
                    <div class="mt-3 ms-3">
                        <h6 style="font-weight: bold;">TODAYS PROFIT</h6>
                    </div>
                    <hr class="ms-3 me-3">
                    <div class="card-body text-start">
                        <p style="font-size: 18px">{{ $payment->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="card  p-3">

                    <div class="d-flex justify-content-between">
                        <h5>RECENT LAUNDRIES</h5>
                        <p><a style="text-decoration: none;" href="{{ route("laundry-list") }}">View All ></a></p>
                    </div>
                    
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Queue</th>
                                    <th scope="col">Reference</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laundries->slice(0, 4) as $list_item)
                                    <tr>
                                        <th scope="row">{{ $list_item->id }}</th>
                                        <td>{{ $list_item->customer_name }}</td>
                                        <td>{{ $list_item->email }}</td>
                                        <td>{{ $list_item->created_at }}</td>
                                        <td>{{ $list_item->queue }}</td>
                                        <td>{{ $list_item->reference }}</td>
                                        <td>
                                            @if ($list_item->status === '2')
                                                <span class="badge text-bg-success">completed</span>
                                            @elseif($list_item->status === '1')
                                                <span class="badge text-bg-info">In Progress</span>
                                            @else
                                                <span class="badge text-bg-danger">pending</span>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
