@component('mail::message')
# Thank you for your order!

Your order is on-hold until we confirm payment has been received. Your order details are shown below for your reference:

## Order #{{ $order->code }} ({{\General::datetimeFormat($order->order_date)}})

@component('mail::table')
| Product       | Quantity      | Price  |
| ------------- |:-------------:| --------:|
@foreach ($order->orderItems as $item)
| {{ $item->name }}      |  {{ $item->qty }}      | {{ \General::priceFormat($item->sub_total) }}      |
@endforeach
| &nbsp;         | <strong>Sub total</strong> | {{ \General::priceFormat($order->base_total_price) }} |
{{-- | &nbsp;         | Tax (10%)     | {{ \General::priceFormat($order->tax_amount) }} | --}}
| &nbsp;         | Ongkos Kirim | {{ \General::priceFormat($order->shipping_cost) }} |
| &nbsp;         | <strong>Total</strong> | <strong>{{ \General::priceFormat($order->grand_total) }}</strong>|
@endcomponent

## Billing Details:
<strong>{{ $order->customer_first_name }} {{ $order->customer_last_name }}</strong>
<br> {{ $order->customer_address1 }}
<br> {{ $order->customer_address2 }}
<br> Email: {{ $order->customer_email }}
<br> Telp./WA{{ $order->customer_phone }}
<br> Kode Pos {{ $order->customer_postcode }}

## Shipment Address (shipped by: {{ $order->shipping_service_name }}):
<strong>{{ $order->shipment->first_name }} {{ $order->shipment->last_name }}</strong>
<br> {{ $order->shipment->address1 }}
<br> {{ $order->shipment->address2 }}
<br> Email: {{ $order->shipment->email }}
<br> Telp./WA{{ $order->shipment->phone }}
<br> Kode Pos {{ $order->shipment->postcode }}

@component('mail::button', ['url' => url('orders/received/'. $order->id)])
Show order detail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
