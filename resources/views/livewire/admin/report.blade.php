<div class="container">
    <div class="mt-3 ms-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Report</li>
            </ol>
        </nav>
    </div>

    {{-- <div class="d-flex justify-content-end me-4 mt-5">
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                class="bi bi-plus"></i> New Laundry</button>
    </div> --}}

    <div class="card shadow border-0 m-4 p-3">
        <div class="row mb-2">
            <div class="col-sm-4 col-lg-4 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date From</label>
                <input type="date" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="col-sm-4 col-lg-4 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date To</label>
                <input type="date" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="col-sm-6 col-lg-4 mb-3">
                <button class="btn btn-outline-primary  btn-expand me-2" style="margin-top: 30px;"><i class="bi bi-sort-down"></i> Filter</button>
                <button class="btn btn-outline-primary  btn-expand " style="margin-top: 30px;"><i class="bi bi-printer-fill"></i> Print</button>
                {{-- <button class="btn btn-outline-primary btn-sm"> Print</button> --}}
            </div>
        </div>

        <hr>


        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped table-hover" style="overflow-x: auto;">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12-02-2020</td>
                        <td>Clinton Onitsha</td>
                        <td class="text-end">135.00</td>
                        <td>Clinton Onitsha</td>
                        <td class="text-end">135.00</td>
                    </tr>

                    <tr>
                        <td>12-02-2020</td>
                        <td>Felix Smart</td>
                        <td class="text-end">45.00</td>
                        <td>Clinton Onitsha</td>
                        <td class="text-end">135.00</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end">Total</td>
                        <td class="text-end">135.00</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


</div>
