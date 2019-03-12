@extends('layouts.dashboard')

@section('inner-content')
    <h1>Update Products</h1>
    {!! Form::open(['action' => ['ProductsController@update', $product->id_product], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('nama_product', 'Nama Product') }}
            {{ Form::text('nama_product', $product->nama_product, ['class' => 'form-control', 'placeholder' => 'Nama Product']) }}
        </div>

        <div class="form-group">
            {{ Form::label('harga', 'Harga') }}
            {{ Form::text('harga', $product->harga, ['class' => 'form-control', 'placeholder' => 'Harga']) }}
        </div>

        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection