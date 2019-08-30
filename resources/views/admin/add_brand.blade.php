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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brand</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{URL::to('/save-brand')}}" method="post">

						{{ csrf_field() }}

						  <fieldset>
							<div class="control-group">
							  <label class="control-label">Brand Name</label>
							  <div class="controls">
								<input type="text" class="input" name="brand_name" required="">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label">Brand Discripton</label>
							  <div class="controls">
								<textarea class="" name="brand_discripton" rows="3" required=""></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" class="input" name="publication_status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Brand</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection