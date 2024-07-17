@component('mail::message')
    Incoming Message From Dominion Laundry Care,


    Customer Name: {{ $details['fullname'] }}

    Email: {{ $details['email'] }}

    Message: {{ $details['message'] }}
@endcomponent
