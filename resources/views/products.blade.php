@extends('layouts.app')
@section('products')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>List of products</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('product/create') }}" class="btn btn-info" >Añadir Libro</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Sku</th>
               <th>Name</th>
               <th>Description</th>
               <th>Image</th>
               <th>Stock</th>
               <th>Price</th>
               <th>Father Category</th>
               <th>Edit</th>
               <th>Delete</th>
             </thead>
             <tbody>
              @if($products->count())  
              @foreach($products as $product)  
              <tr>
                <td>{{$product->sku}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->imagen}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->category_id}}</td>
                <td><a class="btn btn-primary btn-xs" href="/product/{{ $product->id }}/edit"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="/category/{{$product->id }}/delete" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $products->links() }}
    </div>
  </div>
</section>

@endsection