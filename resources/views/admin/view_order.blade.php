@extends('admin_layout')
@section('admin_content')
	
	<div class="row-fluid sortable">
		<!-- Customer Table -->
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
			</div>
			<div class="box-content">
				<table class="table">
					<thead>
						<tr>
							<th>Customer Name</th>
							<th>Mobile</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($order_by_id as $v_order)
							@endforeach
						    <td>{{$v_order->customer_name}}</td>
							<td>{{$v_order->customer_mobile}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>


		<!-- Shipping Table -->
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Sipping Details</h2>
			</div>
			<div class="box-content">
				<table class="table">
					<thead>
						<tr>
							<th>Shhiping Id</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Address</th>
							<th>City</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($order_by_id as $v_order)
							@endforeach
							<td>{{$v_order->id}}</td>
							<td>{{$v_order->email}}</td>
							<td>{{$v_order->m_number}}</td>
							<td>{{$v_order->address}}</td>
							<td>{{$v_order->city}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
	</div>



	<div class="row-fluid sortable">
		<!-- Order Details -->
		<div class="box span12">
			<div class="box-header">
				<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
			</div>
			<div class="box-content">
				<table class="table">
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Product Id</th>
							<th>Product Name</th>
							<th>Product Price</th>
							<th>Product Sales Quantity</th>
							<th>Total Sub Price</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order_by_id as $v_order)
						<tr>
							<td>{{$v_order->order_id}}</td>
							<td>{{$v_order->product_id}}</td>
							<td>{{$v_order->product_name}}</td>
							<td>{{$v_order->product_price}}</td>
							<td>{{$v_order->product_sales_quantity}}</td>
							<td>{{$v_order->product_price*$v_order->product_sales_quantity}}</td>
						</tr>
						@endforeach
					</tbody>

					<tfoot>
						<tr>
							<td colspan="4">Total with vat: </td>
							<td><strong>={{$v_order->order_total}}TK</strong></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>	
	</div>



@endsection