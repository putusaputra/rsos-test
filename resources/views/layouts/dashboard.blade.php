@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-lg-4 float-left">
                        <ul>
                            <li>Transactions
                                <ul>
                                    <li><a href="/transactions">Recent Transactions</a></li>
                                    <li><a href="/transactions/create">Add Transactions</a></li>
                                </ul>
                            </li>
            
                            <li>Agent
                                <ul>
                                    <li><a href="/agents">List Agent</a></li>
                                    <li><a href="/agents/create">Add Agent</a></li>
                                </ul>
                            </li>
            
                            <li>Product
                                <ul>
                                    <li><a href="/products">List Product</a></li>
                                    <li><a href="/products/create">Add Product</a></li>
                                </ul>
                            </li>
            
                            <li>Reports
                                <ul>
                                    <li><a href="/reports">Transactions</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8 float-left">
                        @yield('inner-content')
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
