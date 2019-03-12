<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Agent;
class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = DB::select('select * from v_transactions');
        $agents = Agent::pluck('nama_agent','id_agent')->toArray();
        return view('dashboard.report.list-report', compact('transactions', 'agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agents = Agent::pluck('nama_agent','id_agent')->toArray();
        $input_date = $request->input('input_date');
        $id_agent = $request->input('id_agent');
        /*$data = array(
            'input_date' => $input_date,
            'id_agent' => $id_agent
        );*/
        $transactions = DB::select('select * from v_transactions where input_date=? and id_agent=?',[$input_date, $id_agent]);
        return view('dashboard.report.list-report-content', compact('transactions', 'agents'))->with('input_date', $input_date)->with('id_agent', $id_agent);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
