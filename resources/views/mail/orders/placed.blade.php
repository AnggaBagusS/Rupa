<x-mail::message>
# Order Placed Successfully

Thank you for your order! Your order has been placed successfully. Here are the details: {{ $order->id }}.

<x-mail::button :url="$url">
View Order Details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
