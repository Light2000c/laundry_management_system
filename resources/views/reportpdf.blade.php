<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="modal-body">


            <div>
                <div class="table-responsive">
                    <table class="table  table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laundries as $laundry)
                                <tr>
                                    <td>{{ $laundry->created_at }}</td>
                                    <td>{{ $laundry->customer_name }}</td>
                                    <td>{{ $laundry->email }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-end">Total</td>
                                <td class="text-end">₦{{ $total }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
