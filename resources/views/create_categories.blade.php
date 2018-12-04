@extends('layouts.app')
@section('create_categories')
	<section class="container">
		<div class="row justify-content-center">
		@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
		@endif
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">New Category</h3>
			</div>
			<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('category.store') }}" role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="description" id="description" class="form-control input-sm" placeholder="Description">
									</div>
								</div>
						    
							<div class="btn-group" role="group">
								<label for="father_category">Categoría Padre:</label>
									<select name="father_category">
										@foreach($categories as $category)
										<option value="{{$category->description}}">{{$category->description}}</option>
										@endforeach
									</select>
							</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Save" class="btn btn-success btn-block">
									<a href="/category" class="btn btn-info btn-block" >Back</a>
								</div>	
							</div>
						</form>
					</div>
			</div>
</div>
</section>
@endsection