@extends('layouts.dashboard')

@section('inner-content')
    <h1>Create Transactions</h1>

    {!! Form::open(['action' => 'TransactionsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('input_date', 'Input Date') }}
            {{ Form::date('input_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Input Date']) }}
        </div>
        <div class="form-group">
            {{ Form::label('customer_name', 'Customer Name') }}
            {{ Form::text('customer_name', '', ['class' => 'form-control', 'placeholder' => 'Customer Name']) }}
        </div>

        <div class="form-group">
            {{ Form::label('nama_product', 'Nama Product') }}
            <div>
                {{ Form::select('id_product', $products, ['class' => 'form-control', 'placeholder' => 'Pilih Nama Product']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('nama_agent', 'Nama Agent') }}
            <div>
                {{ Form::select('id_agent', $agents, ['class' => 'form-control', 'placeholder' => 'Pilih Nama Agent']) }}
            </div>
        </div>

        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection