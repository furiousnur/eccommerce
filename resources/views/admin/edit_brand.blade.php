@extends('admin_layout')
@section('admin_content')

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

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{('/dashboard')}}">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{URL::to('/update-brand', $brand_info->brand_id) }}" method="post">

						{{ csrf_field() }}

						  <fieldset>
							<div class="control-group">
							  <label class="control-label">Brand Name</label>
							  <div class="controls">
								<input type="text" class="input" name="brand_name" value="{{$brand_info->brand_name}}">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label">Brand Discripton</label>
							  <div class="controls">
							  <!-- class="cleditor" -->
								<textarea class="" name="brand_discripton" rows="3"> {{ $brand_info->brand_discripton }} </textarea>
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Brand</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection