@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="register-req">
				<h4 style="color: red;">Please Fill Up This Form................</h4>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action={{URL::to('/bill-submit')}} method="post">
									{{csrf_field()}}
									<input type="text" placeholder="First Name *" name="f_name" required="">
									<input type="text" placeholder="Last Name *" name="l_name" required="">
									<input type="text" placeholder="Email*" name="email" required="">
									<input type="text" placeholder="Mobile Number *" name="m_number" required="">
									<input type="text" placeholder="Address *" name="address" required="">
									<input type="text" placeholder="City *" name="city" required="">
									<input style="color: red;" type="submit" name="submit" class="btn btn-default" value="Submit">
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->


@endsection