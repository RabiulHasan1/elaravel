@extends('admin_layout')
@section('admin_content')
	
	<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Order</a></li>
			</ul>
				<p class="alert alert-success alert-dismissible">
						<?php
								$catmsg = Session::get('catmsg');
								if($catmsg){
									echo $catmsg;
									Session::put('catmsg',null);
								}
							?>
						</p>
						
						</p>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Order</h2>

						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order Id</th>
								  <th>Customer Name</th>
								  <th>Total Order</th>
								  <th>Order Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead> 
						  @foreach ($all_order_info as $v_order)
						    	
						    
						  <tbody>
							<tr>
								<td>{{ $v_order->order_id }}</td>
								<td class="center">{{ $v_order->customer_name }}</td>
								<td class="center">{{ $v_order->order_total }}</td>
								<td class="center">{{ $v_order->ordar_status }}</td>

								
								<td class="center">
									
										
									
									@if ($v_order->ordar_status == 'pending')
										<a class="btn btn-success" href="{{URL::to('/unactive_order/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-up"></i>
									@else($v_order->ordar_status == 'Done')
										<a class="btn btn-danger" href="{{URL::to('/active_order/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>    
									@endif
									
									
									<a class="btn btn-info" href="{{URL::to('/view_order/'.$v_order->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{URL::to('/delete_order/'.$v_order->order_id)}}">
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