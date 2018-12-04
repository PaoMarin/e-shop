@extends('layouts.app')
@section('edit_categories')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Category</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('libro.update',$libro->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="description" id="description" class="form-control input-sm" value="{{$category->description}}">
									</div>
								</div>
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
										Seleccione una opción
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										@foreach($categories as $category)
										<li><a href="{{$category->id}}">{{$category->father_category}}</a></li>
										@endforeach
									</ul>
								 </div>
							</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Update" class="btn btn-success btn-block">
									<a href="{{ route('categories') }}" class="btn btn-info btn-block" >Back</a>
								</div>	
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
   </section>
@endsection