@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Product</a>
				</li>
			</ul>

<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<p class="alert alert-success alert-dismissible">
							<?php
								$message = Session::get('message');
								if($message){
									echo $message;
									Session::put('message',null);
								}
							?>
						</p>
						
						<form class="form-horizontal" method="post" action="{{url('update_product/'.$single_product->product_id)}}" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="categoryname">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" value="{{$single_product->product_name}}" name="product_name">
							  </div>
							</div>

							  
							   


							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description" rows="3">
									{{$single_product->product_short_description}}
								</textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description" rows="3">
									{{$single_product->product_long_description}}
								</textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="categoryname">Product Price</label>
							  <div class="controls">
								<input type="text" value="{{$single_product->product_price}}" class="input-xlarge" name="product_price">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <img style="height: 50px; width: 50px;" src="{{URL::to($single_product->product_image)}}" >
							  <hr>	
							  <div class="controls">
								<input class="input-file uniform_on" 
								name="product_image" id="fileInput" value="{{$single_product->product_image}}" type="file">
							  </div>
							</div> 

							<div class="control-group">
							  <label class="control-label" for="categoryname">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" value="{{$single_product->product_size}}"  name="product_size">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="categoryname">Product Color</label>
							  <div class="controls">
								<input type="text" value="{{$single_product->product_color}}" class="input-xlarge" name="product_color">
							  </div>
							</div>

							


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

@endsection