@extends('admin_layout')
@section('admin_content')
	
	<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Category</a></li>
			</ul>
				<p class="alert alert-success alert-dismissible">
						<?php
								$SuccessMsg = Session::get('SuccessMsg');
								if($SuccessMsg){
									echo $SuccessMsg;
									Session::put('SuccessMsg',null);
								}
							?>
						</p>
						
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Category</h2>

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
								  <th>Product Id</th>
								  <th>Product Name</th>
								  <th>Category Name</th>
								  <th>Manufacture Name</th>
								  <th>Product Image</th>
								  <th>Product price</th>
								  <th>Product Colos</th>
								  <th>Product Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead> 
						  @foreach ($all_product_info as $v_product)
						    	
						    
						  <tbody>
							<tr>
								<td>{{ $v_product->product_id }}</td>
								<td>{{ $v_product->product_name }}</td>
								<td>{{ $v_product->category_name }}</td>
								<td>{{ $v_product->manufacture_name }}</td>
								<td><img src="{{URL::to($v_product->product_image)}}" style="height: 80px; width: 80px;" alt=""></td>
								<td>{{ $v_product->product_price }}</td>
								
								<td>{{ $v_product->product_color }}</td>
								
								<td class="center">
									@if ($v_product->publication_status == 1)
										<span class="label label-success">Active</span>
									@else ($v_product->publication_status == 0)
										<span class="label label-danger">Deactive</span>
									@endif
									
								</td>
								<td class="center">
									@if ($v_product->publication_status == 1)
										<a class="btn btn-danger" href="{{URL::to('/unactive_product/'.$v_product->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else($v_product->publication_status == 0)
										 <a class="btn btn-success" href="{{URL::to('/active_product/'.$v_product->product_id)}}">
								<i class="halflings-icon white thumbs-up"></i>  
							</a>
									@endif
									
									<a class="btn btn-info" href="{{URL::to('/edit_product/'.$v_product->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{URL::to('/delete_product/'.$v_product->product_id)}}">
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