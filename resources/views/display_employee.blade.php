@extends('layouts.main') 
@section('content')
@section('title', $data)

	
	<div class="container-fluid">
	@foreach($data as $all)
<div class="modal fade edit-layout-modal pr-0" id="productView" tabindex="-1" role="dialog" aria-labelledby="productViewLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="productViewLabel" >{{$all->name}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-4">
                        
						<img src="{{'../images/1713218359.jpg'}}" class="img-fluid" >
						<div class="other-images">
							
						</div>
					</div>
					<div class="col-8">
						<p>
						</p>
						<div class="badge badge-pill badge-dark">Electronics</div>
						<div class="badge badge-pill badge-dark">Accesories &amp; Gadgets</div>
						<p></p>
						<h3 class="text-danger">
							$ 1234
							<del class="text-muted f-16">$ 1250</del>
						</h3>
						<p class="text-green">Purchase Price: $ 1000</p>
						<p>Apple iPhone 6 smartphone. Announced Sep 2014. Features 4.7″ display, Apple A8 chipset, 8 MP primary camera, 1.2 MP front camera, 1810 mAh</p>
						<p>In Stock: 100</p>
						<p>Spplier: PZ Tech</p>
					</div>
				</div>
				<h5><strong>Sales</strong></h5>
				<div id="line_chart" class="chart-shadow"></div>

			</div>
		</div>
	</div>
    </div>
	</div>
@endforeach
	@push('script')
	<script src="{{ asset('plugins/amcharts/amcharts.js') }}"></script>
	<script src="{{ asset('plugins/amcharts/gauge.js') }}"></script>
	<script src="{{ asset('plugins/amcharts/serial.js') }}"></script>
	<script src="{{ asset('plugins/amcharts/themes/light.js') }}"></script>
	<script src="{{ asset('plugins/amcharts/animate.min.js') }}"></script>
	<script src="{{ asset('plugins/amcharts/pie.js') }}"></script>
	<script src="{{ asset('plugins/ammap3/ammap/ammap.js') }}"></script>
	<script src="{{ asset('plugins/ammap3/ammap/maps/js/usaLow.js') }}"></script>
	<script src="{{ asset('js/product.js') }}"></script>
	@endpush

@endsection
