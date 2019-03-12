@extends('layouts.dashboard')

@section('inner-content')
    <h1>List Agents</h1>
    <table class="table">
            <thead>
                <tr>
                    <th>ID Agent</th>
                    <th>Nama Agent</th>
                    <th>Alamat</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

   @if (count($agents) > 0)
                
                @php
                    $i = 0;    
                @endphp
                
                @foreach ($agents as $agent)
                    @php
                        $i++;   
                    @endphp
                    <tr>
                        <td>{{ $agent->id_agent }}</td>
                        <td>{{ $agent->nama_agent }}</td>
                        <td>{{ $agent->alamat }}</td>
                        <td>{{ $agent->phone }}</td>
                        <td>
                            <a class="btn btn-success" href="/agents/{{ $agent->id_agent }}/edit">
                                <img src="{{ asset('icons/pencil.svg') }}"/>
                            </a>
                            
                            <a class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-form{{ $i }}').submit();">
                                <img src="{{ asset('icons/trashcan.svg') }}"/>
                            </a>
                            
                         {!! Form::open(['id' => 'delete-form'.$i, 'action' => ['AgentsController@destroy', $agent->id_agent], 'method' => 'POST'])
                         !!}
                          {{ Form::hidden('_method', 'DELETE') }}
                          {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'style' => 'display: none;']) }}
                         {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
               
    
    @else
        <tr>
            <td colspan="5">No Agents Found</td>
        </tr>
   @endif

            </tbody>
            </table>
@endsection