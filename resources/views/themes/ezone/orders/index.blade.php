@extends('themes.ezone.layout')

@section('content')
	<div class="p-5 judul" >
		<div class="container-fluid">
			<div class="breadcrumb-content text-center">
				<h2>Daftar Pesanan</h2>
				{{-- <ul>
					<li><a href="{{ url('/') }}">home</a></li>
					<li>my favorites</li>
				</ul> --}}
			</div>
		</div>
	</div>
	<div class="shop-page-wrapper shop-page-padding">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
					@include('themes.ezone.partials.user_menu')
				</div>
				<div class="col-lg-9">
					@include('admin.partials.flash')
					<div class="shop-product-wrapper res-xl">
						<div class="table-content table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<th>ID Pemesanan</th>
									<th>Total Biaya</th>
									<th>Status</th>
									<th>Pembayaran</th>
									<th>Aksi</th>
								</thead>
								<tbody>
									@forelse ($orders as $order)
										<tr>    
											<td>
												{{ $order->code }}<br>
												<span style="font-size: 12px; font-weight: normal"> {{\General::datetimeFormat($order->order_date) }}</span>
											</td>
											<td>{{\General::priceFormat($order->grand_total) }}</td>
											<td>{{ $order->status }}</td>
											<td>{{ $order->payment_status }}</td>
											<td>
												<a href="{{ url('orders/'. $order->id) }}" class="btn btn-info btn-sm">detail</a>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="5">Data tidak ditemukan</td>
										</tr>
									@endforelse
								</tbody>
							</table>
							{{ $orders->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection