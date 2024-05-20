<div class="container">
    <div class="mt-3 ms-4">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>
    </div>

    <div class="d-flex justify-content-end me-4 mt-5">
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                class="bi bi-plus"></i> New user</button>
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
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Clinton Onitsha</td>
                        <td>Clint2000</td>
                        <td>User</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-outline-primary btn-sm me-2"><i
                                        class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-outline-primary btn-sm"><i class="bi bi-trash3"></i></button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="p-3">
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Username</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">Password</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="">User Type</label>
                                   <select class="form-control" name="" id="">
                                    <option value="" selected>Select user type</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                   </select>
                                </div>
                            </div>
                        </form>
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
