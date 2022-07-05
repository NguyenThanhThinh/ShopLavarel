<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Http\Requests\UpdateagentRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::get();
       return  view('agents.list',compact('agents'));
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
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
        ];
        $message =[
            'name.required' => '代理店名を入力してください。',
            'name.max' => '100⽂字未満で⼊⼒してください',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しい形式のメールアドレス',
            'email.max' => '100⽂字未満で⼊⼒してください',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $data = $request->all();
            $data['phone'] = "";
            if(!empty($data['phone1']) && !empty($data['phone2']) && !empty($data['phone3'])){
                $fullPhone = $data['phone1'] . '-' . $data['phone2']. '-' . $data['phone3'];
                $data['phone'] = $fullPhone;
            }else{
                Session::flash('error', 'phone。');
                return redirect()->back()->withErrors($validator)->withInput($request->input());
            }

            Agent::create($data);
            Session::flash('success', 'success');
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
    public function edit($id)
    {
        $agent = Agent::FindOrFail($id);
        if(!empty($agent['phone'])){
            $arrayPhone = explode('-', $agent['phone']);
            $agent['phone1'] = $arrayPhone[0];
            $agent['phone2'] = $arrayPhone[1];
            $agent['phone3'] = $arrayPhone[2];
        }else{
            $agent['phone1'] = null;
            $agent['phone2'] = null;
            $agent['phone3'] = null;
        }

        return view('agents.edit', compact('agent'));
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
