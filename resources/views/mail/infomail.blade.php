@component('mail::message')

Dear {{$details['data']->customer_name}},

We are delighted to inform you that your laundry order is ready for pickup. Thank you for choosing Dominion Laundry Care!

Order details

Customer Name: {{ $details['data']->customer_name }}

Reference: {{ $details['data']->reference }}

Total Bill: ₦{{ number_format($details['total']) }}

You can use the above reference number to confirm your order status. Simply visit our tracking page [tracking page] and enter your reference number for real-time updates.

If you have any questions or need further assistance, please do not hesitate to contact our customer support team at support@dominionlaundrycare.com.ng.

Thank you for choosing Dominion Laundry Care!

Best regards,

The Dominion Laundry Care Team

@endcomponent
