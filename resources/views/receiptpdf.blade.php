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
                <p>Customer Name: {{ $laundry_list->customer_name}}</p>
                <p>Customer Email: {{ $laundry_list->email}}</p>
                <p>Remark: {{ $laundry_list->remark}}</p>
                <p>Laundry Status:
                    @if ($laundry_list->status === '2')
                        <span class="badge text-bg-success">success</span>
                    @elseif($laundry_list->status === '1')
                        <span class="badge text-bg-info">In Progress</span>
                    @else
                        <span class="badge text-bg-danger">pending</span>
                    @endif
                </p>
                <p>Total Item:  {{ $total_items }}</p>
                <p>Paid At: {{ $laundry_list->paid_at }} </p>
                <p>Paid Through: Paystack</p>
            </div>

            <div>
                <div class="table-responsive">
                    <table class="table  table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col-3">Category Name</th>
                                <th scope="col-3">weight</th>
                                <th scope="col-3">unit Price</th>
                                <th scope="col-3">Amount</th>
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
    </div>
</body>

</html>
