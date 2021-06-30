@extends('themes.ezone.layout')

@section('content')
	<!-- header end -->
	<div class="p-5 judul" >
		<div class="container">
			<div class="breadcrumb-content text-center">
				<h2>Pesanan Diterima</h2>
				{{-- <ul>
					<li><a href="{{ url('/') }}">home</a></li>
					<li>Order Received</li>
				</ul> --}}
			</div>
		</div>
	</div>
	<!-- checkout-area start -->
	<div class="cart-main-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					@include('admin.partials.flash', ['$errors' => $errors])
					<h1 class="cart-heading">Pesanan Anda:</h4>
					<div class="row">
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
							<address>
								{{ $order->customer_first_name }} {{ $order->customer_last_name }}
								<br> {{ $order->customer_address1 }}
								<br> {{ $order->customer_address2 }}
								<br> Email: {{ $order->customer_email }}
								<br> Telp./WA: {{ $order->customer_phone }}
								<br> Kode Pos: {{ $order->customer_postcode }}
							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Shipment Address</p>
							<address>
								{{ $order->shipment->first_name }} {{ $order->shipment->last_name }}
								<br> {{ $order->shipment->address1 }}
								<br> {{ $order->shipment->address2 }}
								<br> Email: {{ $order->shipment->email }}
								<br> Telp./WA: {{ $order->shipment->phone }}
								<br> Kode Pos: {{ $order->shipment->postcode }}
							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								Invoice ID:
								<span class="text-dark">#{{ $order->code }}</span>
								<br> {{ \General::datetimeFormat($order->order_date) }}
								<br> Status: {{ $order->status }}
								<br> Status Pembayaran: {{ $order->payment_status }}
								<br>  Jasa Pengiriman : {{ $order->shipping_service_name }}
							</address>
						</div>
					</div>
					<div class="table-content table-responsive">
						<table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Item</th>
									<th>Deskripsin</th>
									<th>Jumlah</th>
									<th>Harga item</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($order->orderItems as $item)
									<tr>
										<td>{{ $item->sku }}</td>
										<td>{{ $item->name }}</td>
										<td>{!! \General::showAttributes($item->attributes) !!}</td>
										<td>{{ $item->qty }}</td>
										<td>{{ \General::priceFormat($item->base_price) }}</td>
										<td>{{ \General::priceFormat($item->sub_total) }}</td>
									</tr>
								@empty
									<tr>
										<td colspan="6">Order item not found!</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-5 ml-auto">
							<div class="cart-page-total">
								<ul>
									{{-- <li> Subtotal
										<span>{{ \General::priceFormat($order->base_total_price) }}</span>
									</li>
									<li>Tax (10%)
										<span>{{ \General::priceFormat($order->tax_amount) }}</span>
									</li> --}}
									<li>Ongkos Kirim
										<span>{{ \General::priceFormat($order->shipping_cost) }}</span>
									</li>
									<li>Total
										<span>{{ \General::priceFormat($order->grand_total) }}</span>
									</li>
								</ul>
								@if (!$order->isPaid())
									<a href="{{ $order->payment_url }}">Proceed to payment</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection