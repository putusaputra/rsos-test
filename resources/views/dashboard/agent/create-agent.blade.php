@extends('layouts.dashboard')

@section('inner-content')
    <h1>Create Agents</h1>
    {!! Form::open(['action' => 'AgentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('nama_agent', 'Nama Agent') }}
            {{ Form::text('nama_agent', '', ['class' => 'form-control', 'placeholder' => 'Nama Agent']) }}
        </div>

        <div class="form-group">
            {{ Form::label('alamat', 'Alamat') }}
            {{ Form::text('alamat', '', ['class' => 'form-control', 'placeholder' => 'Alamat']) }}
        </div>

        <div class="form-group">
            {{ Form::label('phone', 'Phone') }}
            {{ Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone']) }}
        </div>

        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection