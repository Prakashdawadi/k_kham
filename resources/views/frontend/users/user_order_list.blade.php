@include('frontend.header')

	
	<h2>you are in the order list page</h2>
	<hr>



		<div class="container-fluid">
		<!-- <div class="row">
			<div class="col-12">
			<h4 class="text-center text-dark bg-secondary">you</h4>
			</div>
			
		</div> -->
		<table class="table table-bordered table-hover">
			<thead  class="offset-col-1 text-center text-white bg-dark">
				<th>SN.</th>
				<th>Order ID</th>
				<th>Foodname</th>
				<th>quantity</th>	
				<th>subtotal</th>			
				<th>resturantname</th>
				
				<th>Grandtotal</th>
				</thead>
			<tbody>
										<?php 
											$i=1;
											 ?>	

											
						@foreach($data as $datas)

									<tr>
										<td ><?php echo $i; ?>
										<?php $i++; ?>
					    			
										</td>
									
									<td>
										{{$datas->order_id}}
										
									</td>
								
									<td>										

				   {{$datas->order_items}}
								 
								</td>
			
										<td>

										{{$datas->quantity}}
										
										</td>

									

										<td>
												
								NPR.{{$datas->sub_total}}
							</td>
							<td>
												
								{{$datas->rest_name}}
							</td>
							<td>
												
								NPR.{{$datas->all_total}}
							</td>
											
									</tr>

							@endforeach
												
			</tbody>
			
		</table>


		<div id="message">



 {{$data->links( "pagination::bootstrap-4")}}

</div>
	</div>
</div>






<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


@include('frontend.footer')