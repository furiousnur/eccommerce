@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">

					<?php 

						$content=Cart::content();
						// echo "<pre>";
						// 	print_r($content);
						// echo "</pre>";

					 ?>

				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($content as $v_content){ ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_content->options->image) }}" height="120px;" width="120px;" alt=""></a>
							</td>
							<td class="cart_description">
								<h4>{{$v_content->name}}</h4>
							</td>
							<td class="cart_price">
								<p>{{$v_content->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart')}}" method="post">
										{{csrf_field()}}
										<input  type="text" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2">
										<input type="hidden" name="rowId" value="{{$v_content->rowId}}">
										<input type="submit" name="submit" value="Update" class="btn btn-sm btn-default">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_content->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<div class=" col-sm-8">
		<div class=" headingWrap">
			<h3 class="headingTop text-center"> Select Your PaymentMethod</h3>
		</div>

	<form action="{{URL::to('/order-place')}}" method="post">	
		{{csrf_field()}}
		<div class="PaymentWrap">
			<div class="btn-group PaymentBtnGroup btn-group-justified" data-toogle="buttons">
				<label class="btn PaymentMethod active">
					<img style="height: 50px; width: 70px;" src="payment/handcash.png">
					<div class="method visa">Handcash</div>
					<input type="radio" name="payment_method" value="handcash" checked="">
				</label>	

				<label class="btn PaymentMethod active">
					<img style="height: 50px; width: 50px;" src="payment/bkash.png">
					<div class="method master-card">Bkash</div>
					<input type="radio" name="payment_method" value="bkash" >
				</label>	

				<label class="btn PaymentMethod active">
					<img style="height: 50px; width: 50px;" src="payment/rocket.png">
					<div class="method amex">Rocket</div>
					<input type="radio" name="payment_method" value="rocket" >
				</label>

				<!-- <label class="btn PaymentMethod active">
					<img style="height: 50px; width: 50px;" src="payment/bkash.png">
					<div class="method amex">Paypal</div>
					<input type="radio" name="payment_method" value="paypal" >
				</label> -->	
			</div>

			<div class="footerMavWrap clearfix">
				<br>
				<input type="submit" value="Done" class="btn btn-success pull-left btn-fyi">
			</div>
		</div>
	</form>	
</div>


                    
@endsection