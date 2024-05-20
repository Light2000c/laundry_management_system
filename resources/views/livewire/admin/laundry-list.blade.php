<div class="container">
    <div class="mt-3 ms-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laundry List</li>
            </ol>
        </nav>
    </div>

    <div class="d-flex justify-content-end me-4 mt-5">
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                class="bi bi-plus"></i> New Laundry</button>
    </div>

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
                        <th scope="col">Date</th>
                        <th scope="col">Queue</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>12-02-2020</td>
                        <td>2</td>
                        <td>Clinton Onitsha</td>
                        <td><span class="badge text-bg-success">Claimed</span></td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-outline-primary btn-sm me-2"><i
                                        class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-outline-primary btn-sm"><i class="bi bi-trash3"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>12-02-2020</td>
                        <td>2</td>
                        <td>Ezekiel Smith</td>
                        <td><span class="badge text-bg-success">Claimed</span></td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-outline-primary btn-sm me-2"><i
                                        class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Laundry</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="p-3">
                        <div class="col-sm-6 col-lg-4 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Customer Name</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="Sample">
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-4 col-lg-4 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Laundry Category</label>
                                <select class="form-control" name="" id="">
                                    <option value="" selected>Select category</option>
                                </select>
                            </div>
                            <div class="col-sm-4 col-lg-4 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Weight</label>
                                <input type="number" value="0" class="form-control"
                                    id="exampleFormControlInput1">
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <button class="btn btn-primary" style="margin-top: 30px;"><i class="bi bi-plus"></i>
                                    Add to List</button>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td>Mark</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr> --}}
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

</div>
