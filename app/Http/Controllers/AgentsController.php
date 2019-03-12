<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();
        return view('dashboard.agent.list-agent')->with('agents', $agents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.agent.create-agent');
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
            'nama_agent' => 'required',
            'alamat' => 'required',
            'phone' => 'required'
        ]);

        //Create Agent
        $agent = new Agent;
        $agent->nama_agent = $request->input('nama_agent');
        $agent->alamat = $request->input('alamat');
        $agent->phone = $request->input('phone');
        $agent->save();

        return redirect('/agents')->with('success', 'Agent Added!');
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
        $agent = Agent::find($id);
        return view('dashboard.agent.update-agent')->with('agent', $agent);
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
            'nama_agent' => 'required',
            'alamat' => 'required',
            'phone' => 'required'
        ]);

        //Update Agent
        $agent = Agent::find($id);
        $agent->nama_agent = $request->input('nama_agent');
        $agent->alamat = $request->input('alamat');
        $agent->phone = $request->input('phone');
        $agent->save();

        return redirect('/agents')->with('success', 'Agent Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::find($id);
        $agent->delete();

        return redirect('/agents')->with('success', 'Agent Removed!');
    }
}
