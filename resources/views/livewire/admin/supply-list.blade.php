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

                <div class="form-group mt-4 mb-4">
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">* Supply</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-outline-primary">Submit</button>
                    </div>
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
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Clinton Onitsha</td>
                                <td>12-02-2020</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-outline-primary btn-sm me-2"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-outline-danger btn-sm"><i
                                                class="bi bi-trash3"></i></button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>
