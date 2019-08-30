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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">

						{{ csrf_field() }}

						  <fieldset>
							<div class="control-group">
							  <label class="control-label">Procuct Name</label>
							  <div class="controls">
								<input type="text" class="input" name="product_name" required="">
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
									<select id="selectError3" name="category_id" required="">
									<option>Select Category</option>
										<?php 
		                                	$all_publish_category = DB::table('tbl_category')
		                                                        ->where('publication_status', 1)
		                                                        ->get();
		                                foreach ($all_publish_category as $v_category ) { ?>

											<option value="{{$v_category->category_id}}"> {{ $v_category->category_name }}</option>
										<?php } ?>	
									</select>
								 </div>	
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Brand Name</label>
								<div class="controls">
									<select id="selectError3" name="brand_id" required="">
									 <option>Select Brand</option>
										<?php 
		                                	$all_publish_brand = DB::table('tbl_brands')
		                                                        ->where('publication_status', 1)
		                                                        ->get();
		                                foreach ($all_publish_brand as $v_brand ) { ?>

											<option value="{{$v_brand->brand_id}}">{{ $v_brand->brand_name }}</option>
										<?php } ?>
									</select>
								 </div>	
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label">Product Short Discripton</label>
							  <div class="controls">
								<textarea style="height: 100px; width: 350px" name="product_short_desc" class="form-control" required=""></textarea>
							  </div>
							</div>

							<!-- class="cleditor" -->
							<div class="control-group hidden-phone">
							  <label class="control-label">Product Long Discripton</label>
							  <div class="controls">
								<textarea style="height: 150px; width: 500px;" class="form-control"  name="product_long_desc" required=""></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Product Price</label>
							  <div class="controls">
								<input type="text" class="input" name="product_price" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Product Size</label>
							  <div class="controls">
								<input type="text" class="input" name="product_size" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Product Color</label>
							  <div class="controls">
								<input type="text" class="input" name="product_color" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Product Image</label>
							  <div class="controls">
								<input type="file" class="input" name="product_image">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" class="input" name="publication_status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection