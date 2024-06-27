@component('mail::message')
    Id: {{ $details['data']->id }}

    Customer Name: {{ $details['data']->customer_name }}


    Customer Email: {{ $details['data']->email }}


    Reference: {{ $details['data']->reference }}


    @component('mail::subcopy')
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ratione libero iusto.
    @endcomponent
@endcomponent
