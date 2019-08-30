@extends('admin_layout')
@section('admin_content')

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

				<!-- session message start -->
				<p class="alert-success" style="font-size: 20px; color: #149278; text-align: center;">
					<?php 
						$message = Session::get('message');
						if ($message) {
							echo $message;
							session::put('message', null);
						}
					 ?>
				</p>
				<!-- sesstion message end -->

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Brand ID</th>
								  <th>Brand Name</th>
								  <th>Brand Decription</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   

					@foreach( $all_brands_info as $v_brand)
						  <tbody>
							<tr>
								<td>{{ $v_brand->brand_id }}</td>
								<td class="center">{{ $v_brand->brand_name }}</td>
								<td class="center">{{ $v_brand->brand_discripton }}</td>
								
								<td class="center">
								@if($v_brand->publication_status==1)
									<span class="label label-success">Active</span>
								@else
									<span class="label label-danger">Unactive</span>
								@endif	
								</td>

								<td class="center">
								@if($v_brand->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/unactive_brand/'.$v_brand->brand_id )}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
								@else
									<a class="btn btn-success" href="{{URL::to('/active_brand/'.$v_brand->brand_id )}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
								@endif
								

									<a class="btn btn-info" href="{{URL::to('/edit-brand/'.$v_brand->brand_id )}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="{{URL::to('/delete-brand/'.$v_brand->brand_id )}}" id="delete" data-confirm="Are you sure want to delete this item?">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>

							</tr>
						  </tbody>
					@endforeach

					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection