@extends('layouts.app')

@section('categories')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Categories</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ url('category/create') }}" class=" btn btn-primary">Add Category</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Description</th>
               <th>Father Category</th>
               <th>Edit</th>
               <th>Delete</th>
             </thead>
             <tbody>  
             @if($categories->count()) 
              @foreach($categories as $category)  
              <tr>
                <td>{{$category->description}}</td>
                <td>{{$category->father_category}}</td>
                <td><a class="btn btn-info btn-xs" href="/category/{{ $category->id }}/edit"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="/category/{{$category->id }}/delete" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay categorias !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $categories->links() }}
    </div>
  </div>
</section>
@endsection