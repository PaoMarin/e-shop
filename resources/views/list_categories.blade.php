@extends('layouts.app')

@section('list_categories')
  <div class="container">
      <div class="justify-content-center">
        <br /><br />
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-8">
                    Listado de categorias
                  </div>
                </div>
              </div>
              <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
                @endif
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Descripcion</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="tbody">
                    @foreach($categories as $key)
                      <tr>
                        <th scope="row">{{ $key->description }}</th>
                        <th scope="row">{{ $key->father_category }}</th>
                        <td>
                         <a href="/views_products/{{ $key->id }}" id="{{ $key->id }}">Ver</a> 
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $categories->links() }}
              </div>
            </div>
          </div>
        </div>

      </div>
  </div>
@endsection
