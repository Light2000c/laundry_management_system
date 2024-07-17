<div>
    <div class="dark-bg mb-5">
        <div class="dark-content text-center mb-5 mt-5 pb-5 pt-5">
            <h3 style="font-size: 50px;">Our Price List</h3>
        </div>
    </div>


    <div class="container pt-5 pb-5 mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-10 ">

                <div class="mb-5 mt-5">
                    <hr>

                    <div class="row d-flex justify-content-center mt-5 mb-5 text-center ">
                        <div class="col-12 col-lg-6 text-center">
                            <h4>Dominion Laundry Care Price List</h4>
                            <p>Clear and competitive pricing for all your laundry needs, ensuring you receive the best
                                service at the best value.</p>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-10 col-lg-8">
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th class="text-end" scope="col">Price (per unit)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prices as $price)
                                            <tr>
                                                <td class="">{{ $price->name }}</td>
                                                <td class="text-end">₦{{ number_format($price->price) }}</td>
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

    </div>

</div>
</div>
