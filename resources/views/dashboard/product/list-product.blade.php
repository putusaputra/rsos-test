@extends('layouts.dashboard')

@section('inner-content')
    <h1>List Products</h1>
    <table class="table">
            <thead>
                <tr>
                    <th>ID Product</th>
                    <th>Nama Product</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

   @if (count($products) > 0)
                
                @php
                    $i = 0;    
                @endphp
                
                @foreach ($products as $product)
                    @php
                        $i++;   
                    @endphp
                    <tr>
                        <td>{{ $product->id_product }}</td>
                        <td>{{ $product->nama_product }}</td>
                        <td>{{ $product->harga }}</td>
                        <td>
                            <a class="btn btn-success" href="/products/{{ $product->id_product }}/edit">
                                <img src="{{ asset('icons/pencil.svg') }}"/>
                            </a>
                            
                            <a class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-form{{ $i }}').submit();">
                                <img src="{{ asset('icons/trashcan.svg') }}"/>
                            </a>
                            
                         {!! Form::open(['id' => 'delete-form'.$i, 'action' => ['ProductsController@destroy', $product->id_product], 'method' => 'POST'])
                         !!}
                          {{ Form::hidden('_method', 'DELETE') }}
                          {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'style' => 'display: none;']) }}
                         {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
               
    
    @else
        <tr>
            <td colspan="5">No Products Found</td>
        </tr>
   @endif

            </tbody>
            </table>
@endsection