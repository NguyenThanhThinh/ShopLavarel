<?php

namespace App\Http\Controllers;

use App\Models\agent;
use App\Http\Requests\StoreagentRequest;
use App\Http\Requests\UpdateagentRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return  view('agents.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreagentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreagentRequest $request)
    {

        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            return redirect()->route('agent_index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateagentRequest  $request
     * @param  \App\Models\agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateagentRequest $request, agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(agent $agent)
    {
        //
    }
}
