@if ($slides)
	<div class="slider-area">
		<div class="slider-active owl-carousel">
			@foreach ($slides as $slide)
			<div class="single-slider-4">
				<div class="carousel-item active">
					<img src="{{ asset('storage/'. $slide->extra_large) }}" alt="" class="d-block w-100">
				</div>
				{{-- <div class="container">
					<div class="row">
						<div class="ml-auto col-lg-6">
							<div class="furniture-content fadeinup-animated">
								<h2 class="animated">{!! $slide->title !!}</h2>
								<p class="animated">{{ $slide->body }}</p>
								<a class="furniture-slider-btn btn-hover animated" href="{{ $slide->url }}">Go</a>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
			@endforeach
		</div>
	</div>
@endif