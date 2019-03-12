@extends('layouts.dashboard')

@section('inner-content')
    <h1>Create Products</h1>
    {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('nama_product', 'Nama Product') }}
            {{ Form::text('nama_product', '', ['class' => 'form-control', 'placeholder' => 'Nama Product']) }}
        </div>

        <div class="form-group">
            {{ Form::label('harga', 'Harga') }}
            {{ Form::text('harga', '', ['class' => 'form-control', 'placeholder' => 'Harga']) }}
        </div>

        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection