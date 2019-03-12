<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transaction;
use App\Product;
use App\Agent;

class TransactionsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = DB::select('select * from v_transactions limit 5');
        return view('dashboard.transactions.list-transactions')->with('transactions', $transactions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$products = Product::all();
        //$agents = Agent::all();
        $products = Product::pluck("nama_product", "id_product")->toArray();
        $agents = Agent::pluck("nama_agent", "id_agent")->toArray();

        return view('dashboard.transactions.create-transactions', compact('products', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'input_date' => 'required',
            'customer_name' => 'required',
            'id_product' => 'required',
            'id_agent' => 'required'
        ]);

        //Create transaction
        $transaction = new Transaction;
        $transaction->input_date = $request->input('input_date');
        $transaction->customer_name = $request->input('customer_name');
        $transaction->id_product = $request->input('id_product');
        $transaction->id_agent  = $request->input('id_agent');
        $transaction->save();

        return redirect('/transactions')->with('success', 'Transaction Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $products = Product::pluck("nama_product", "id_product")->toArray();
        $agents = Agent::pluck("nama_agent", "id_agent")->toArray();
        return view('dashboard.transactions.update-transactions', compact('transaction', 'products', 'agents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'input_date' => 'required',
            'customer_name' => 'required',
            'id_product' => 'required',
            'id_agent' => 'required'
        ]);

        //Update transaction
        $transaction = Transaction::find($id);
        $transaction->input_date = $request->input('input_date');
        $transaction->customer_name = $request->input('customer_name');
        $transaction->id_product = $request->input('id_product');
        $transaction->id_agent  = $request->input('id_agent');
        $transaction->save();

        return redirect('/transactions')->with('success', 'Transaction Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        return redirect('/transactions')->with('success', 'Transaction Removed!');
    }
}
