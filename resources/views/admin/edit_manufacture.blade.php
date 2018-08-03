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
					<a href="#">Manufacture</a>
				</li>
			</ul>

<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Manufacture</h2>
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
						
						<form class="form-horizontal" method="post" action="{{url('update_manufacture/'.$single_manufacture->manufacture_id)}}">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="categoryname">Manufacture Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="manufacture_name" value="{{$single_manufacture->manufacture_name}}">
							  </div>
							</div>


							       
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Manufacture Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="manufacture_description" rows="3">
									{{$single_manufacture->manufacture_description}}
								</textarea>
							  </div>
							</div>

							


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Manufacture</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

@endsection