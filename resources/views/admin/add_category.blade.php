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
					<a href="#">Category</a>
				</li>
			</ul>

<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<p class="alert alert-success alert-dismissible">
							<?php
								$SuccessMsg = Session::get('SuccessMsg');
								if($SuccessMsg){
									echo $SuccessMsg;
									Session::put('SuccessMsg',null);
								}
							?>
						</p>
						
						<form class="form-horizontal" method="post" action="{{url('save_category')}}">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="categoryname">Category Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="category_name">
							  </div>
							</div>


							       
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="category_description" rows="3"></textarea>
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
							  <button type="submit" class="btn btn-primary">Add Category</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

@endsection