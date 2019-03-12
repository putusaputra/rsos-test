@extends('layouts.dashboard')

@section('inner-content')
    <h1>Update Agents</h1>
    {!! Form::open(['action' => ['AgentsController@update', $agent->id_agent], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('nama_agent', 'Nama Agent') }}
            {{ Form::text('nama_agent', $agent->nama_agent, ['class' => 'form-control', 'placeholder' => 'Nama Agent']) }}
        </div>

        <div class="form-group">
            {{ Form::label('alamat', 'Alamat') }}
            {{ Form::text('alamat', $agent->alamat, ['class' => 'form-control', 'placeholder' => 'Alamat']) }}
        </div>

        <div class="form-group">
            {{ Form::label('phone', 'Phone') }}
            {{ Form::text('phone', $agent->phone, ['class' => 'form-control', 'placeholder' => 'Phone']) }}
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection