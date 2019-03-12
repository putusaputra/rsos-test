@extends('layouts.dashboard')

@section('inner-content')
    <h1>Recent Transactions</h1>
    <table class="table">
            <thead>
                <tr>
                    <th>ID Transactions</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Product</th>
                    <th>Agent</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        
   @if (count($transactions) > 0)
                
                @php
                    $i = 0;    
                @endphp
                
                @foreach ($transactions as $transaction)
                    @php
                        $i++;   
                    @endphp
                    <tr>
                        <td>{{ $transaction->id_transactions }}</td>
                        <td>{{ $transaction->input_date }}</td>
                        <td>{{ $transaction->customer_name }}</td>
                        <td>{{ $transaction->nama_product }}</td>
                        <td>{{ $transaction->nama_agent }}</td>
                        <td>
                            <a class="btn btn-success" href="/transactions/{{ $transaction->id_transactions }}/edit">
                                <img src="{{ asset('icons/pencil.svg') }}"/>
                            </a>
                            
                            <a class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-form{{ $i }}').submit();">
                                <img src="{{ asset('icons/trashcan.svg') }}"/>
                            </a>
                            
                         {!! Form::open(['id' => 'delete-form'.$i, 'action' => ['TransactionsController@destroy', $transaction->id_transactions], 'method' => 'POST'])
                         !!}
                          {{ Form::hidden('_method', 'DELETE') }}
                          {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'style' => 'display: none;']) }}
                         {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
               
    
    @else
        <tr>
            <td colspan="5">No Transactions Found</td>
        </tr>
   @endif

            </tbody>
            </table>
@endsection