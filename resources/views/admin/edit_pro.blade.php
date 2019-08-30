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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{URL::to('/update-product', $product_info->product_id) }}" method="post" enctype="multipart/form-data">

						{{ csrf_field() }}

						  <fieldset>
							<div class="control-group">
							  <label class="control-label">Procuct Name</label>
							  <div class="controls">
								<input type="text" class="input" name="product_name" value="{{ $product_info->product_name}}">
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
									<td>{{ $product_info->category_name}}</td> <br>
									<select id="selectError3" name="category_id">
									<option>{{ $product_info->category_name}}</option>
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
									<td>{{ $product_info->brand_name}}</td> <br>
									<select id="selectError3" name="brand_id">
									 <option>{{ $product_info->brand_name}}</option>
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
								<textarea class="cleditor" name="product_short_desc" rows="3">{{ $product_info->product_short_desc}}</textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label">Product Long Discripton</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_desc" rows="3"> {{ $product_info->product_long_desc}}</textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Product Price</label>
							  <div class="controls">
								<input type="text" class="input" name="product_price" value="{{ $product_info->product_price}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Product Size</label>
							  <div class="controls">
								<input type="text" class="input" name="product_size" value="{{ $product_info->product_size}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Product Color</label>
							  <div class="controls">
								<input type="text" class="input" name="product_color" value="{{ $product_info->product_color}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label"></label>
							  <div class="controls">
							  	<img src="{{URL::to($product_info->product_image)}}" style="height: 120px; width: 120px;">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Product Image</label>
							  <div class="controls">
								<input type="file" class="input" name="product_image">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Product</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

@endsection