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
						
						<form class="form-horizontal" method="post" action="{{url('save_product')}}" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="categoryname">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name">
							  </div>
							</div>

							  <div class="control-group">
								<label class="control-label" for="selectError">Product Category </label>
								<div class="controls">
								  <select id="selectError" name="category_id">
									<option>Select Category</option>
								  	<?php 
								  		$all_category_item = DB::table('tbl_category')->get();
								  		foreach ($all_category_item as $v_category) {
								  			?>
								  			<option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
								  			<?php
								  		}
								  	 ?>
									
								  </select>
								</div>
							  </div>

							   <div class="control-group">
								<label class="control-label" for="selectError">Manufacture Name </label>
								<div class="controls">
								  <select id="selectError" name="manufacture_id" >
								  	<option>Select Brand</option>
								  	<?php 
								  		$all_manufacture_item = DB::table('tbl_manufacture')->get();
								  		foreach ($all_manufacture_item as $v_manufacture) {
								  			?>
								  			<option value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
								  			<?php
								  		}
								  	 ?>
									

									
								  </select>
								</div>
							  </div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Title</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product  Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="categoryname">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
							</div> 

							<div class="control-group">
							  <label class="control-label" for="categoryname">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="categoryname">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="categoryname">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">Active
								<input type="checkbox" name="publication_status" value="0">Deactive
							  </div>
							</div>


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

@endsection