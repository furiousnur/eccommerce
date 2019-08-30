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

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>

							<?php 
                               $customer_id = Session::get('customer_id');
                             ?>                            
                              <?php if($customer_id != NULL) { ?>
                              <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
                              <?php }else { ?>
                              <a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a>
                              <?php } ?>
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->




@endsection