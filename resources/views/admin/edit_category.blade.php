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
						<p class="alert alert-success alert-dismissible fade show">
							<?php
								$catupdate = Session::get('catupdate');
								if($catupdate){
									echo $catupdate;
									Session::put('catupdate',null);
								}
							?>
							
						</p>
						
						<form class="form-horizontal" method="post" action="{{url('/update_category/'.$all_category_info->category_id)}}">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="categoryname">Category Name</label>
							  <div class="controls">
								<input type="text" value="{{$all_category_info->category_name}}" class="input-xlarge" name="category_name">
							  </div>
							</div>


							       
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="category_description"  rows="3">{{$all_category_info->category_description}}</textarea>
							  </div>
							</div>



							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Category</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

@endsection