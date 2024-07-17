@component('mail::message')
    Dear {{ $details['data']->customer_name }},

    Thank you for choosing our laundry service! We are pleased to confirm that we have successfully received your laundry
    order.

    Order details

    Customer Name: {{ $details['data']->customer_name }}

    Reference: {{ $details['data']->reference }}

    Total Bill: ₦{{ $details['total'] }}

    You can use the above reference number to track the status of your laundry. Simply visit our tracking page [tracking
    page] and enter your reference number for real-time updates.

    If you have any questions or need further assistance, please do not hesitate to contact our customer support team at
    support@dominionlaundrycare.com.ng.


    {{-- @component('mail::subcopy')
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ratione libero iusto.
    @endcomponent --}}
@endcomponent
