@extends('layouts.app')
@section('view_products')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>List of products</h3></div>
          <div class="pull-right">
            <div class="btn-group">
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <tr>
               <th>Name</th>
               <th>Description</th>
               <th>Stock</th>
               <th>Price</th>
               <th>Image</th>
               <th></th>
             </tr>
             <tbody>
              @foreach($products as $product)  
              <tr>
                <th scope="row">{{$product->sku}}</td>
                <th scope="row">{{$product->name}}</td>
                <th scope="row">{{$product->description}}</td>
                <th scope="row">{{$product->stock}}</td>
                <th scope="row">{{$product->price}}</td>
                <th scope="row">{{$product->imagen}}</td>
                <th><a class="btn btn-primary btn-xs" href="/product/{{ $product->id }}/Add shopcar"></a></th>
               </tr>
               @endforeach 
            </tbody>

          </table>
        </div>
      </div>
      {{ $view_products->links() }}
    </div>
  </div>
</section>

@endsection