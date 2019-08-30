@extends('layout')
@section('content')
			

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

					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <tbody>
							<tr>
								<td class="center">1. Rocket number: +8801724 575773</td>
							</tr>
							<tr>
								<td class="center">2. Dial *322# for bkash</td>
							</tr>
							<tr>
								<td class="center">3. Select 3 for Payment</td>
							</tr>
						  </tbody>
					  </table>            
					</div>		
				
				<div class="box span4">
					<div class="box-header" data-original-title>
						<h2 style="color: red;"><i class="halflings-icon user"></i><span class="break"></span>Given Bellow rocket txnId</h2>
					</div>
					<div class="box-content">
						<form action="{{URL::to('/rocket')}}" method="post">
							{{ csrf_field() }}
							<table class="table table-striped table-bordered bootstrap-datatable datatable">
							  <thead>
								  <tr>
									  <th>TxnID</th>
								  </tr>
							  </thead>
							  <tbody>
								<tr>
									<td class="center"><input type="text" name="txnid" required=""></td>
								</tr>
								<tr>
									<td class="center"><input type="submit" value="Submit" name="submit"></td>
								</tr>
							  </tbody>
						  </table> 
					  </form>           
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

                    
@endsection