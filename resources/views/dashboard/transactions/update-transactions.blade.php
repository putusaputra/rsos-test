@extends('layouts.dashboard')

@section('inner-content')
    <h1>Update Transactions</h1>
    {!! Form::open(['action' => ['TransactionsController@update', $transaction->id_transactions], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('input_date', 'Input Date') }}
            {{ Form::date('input_date', $transaction->input_date, ['class' => 'form-control', 'placeholder' => 'Input Date']) }}
        </div>
        <div class="form-group">
            {{ Form::label('customer_name', 'Customer Name') }}
            {{ Form::text('customer_name', $transaction->customer_name, ['class' => 'form-control', 'placeholder' => 'Customer Name']) }}
        </div>

        <div class="form-group">
            {{ Form::label('nama_product', 'Nama Product') }}
            <div>
                {{ Form::select('id_product', $products, $transaction->id_product, ['class' => 'form-control', 'placeholder' => 'Pilih Nama Product']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('nama_agent', 'Nama Agent') }}
            <div>
                {{ Form::select('id_agent', $agents, $transaction->id_agent, ['class' => 'form-control', 'placeholder' => 'Pilih Nama Agent']) }}
            </div>
        </div>   

        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection