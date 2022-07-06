<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Http\Requests\UpdateagentRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'phone1' => 'max:4',
            'phone2' => 'max:4',
            'phone3' => 'max:4'
        ];
        $messages =[
            'name.required' => '代理店名を入力してください。',
            'name.max' => '100⽂字未満で⼊⼒してください',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しい形式のメールアドレス',
            'email.max' => '100⽂字未満で⼊⼒してください',
            'phone1.max' => '4⽂字未満で⼊⼒してください',
            'phone2.max' => '4⽂字未満で⼊⼒してください',
            'phone3.max' => '4⽂字未満で⼊⼒してください',
        ];
        $email = $this->checkUniqueColumn('email',$request['email']);
        if($email){
            return redirect()->back()->withInput()->withErrors(['email' => 'メールアドが既存しています。']);
        }
        $bankCode = $this->checkUniqueColumn('bank_code',$request['bank_code']);
        if($bankCode){
            return redirect()->back()->withInput()->withErrors(['bank_code' => '銀行コードが既存しています。']);
        }
        $branchCode = $this->checkUniqueColumn('branch_code',$request['branch_code']);
        if($branchCode){
            return redirect()->back()->withInput()->withErrors(['branch_code' => '支店コードが既存しています。']);
        }
        $accountNo = $this->checkUniqueColumn('account_no',$request['account_no']);
        if($accountNo){
            return redirect()->back()->withInput()->withErrors(['account_no' => '口座番号が既存しています。']);
        }
        $lineUrl = $this->checkUniqueColumn('line_url',$request['line_url']);
        if($lineUrl){
            return redirect()->back()->withInput()->withErrors(['line_url' => 'LINE IDorURLが既存しています。']);
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $data = $request->all();
            $data['phone'] = "";
            if(!empty($data['phone1']) && !empty($data['phone2']) && !empty($data['phone3'])){
                $fullPhone = $data['phone1'] . '-' . $data['phone2']. '-' . $data['phone3'];
                $data['phone'] = $fullPhone;
                $phone = $this->checkUniqueColumn('phone',$fullPhone);
                if($phone){
                    Session::flash('error', '電話番号が既存しています。');
                    return redirect()->back()->withInput($request->input());
                }
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
            $agent['phone1'] = "";
            $agent['phone2'] = "";
            $agent['phone3'] = "";
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
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:100',
            'email' => "required|unique:agents|max:100",
            'phone1' => 'max:4',
            'phone2' => 'max:4',
            'phone3' => 'max:4'
        ];
        $messages =[
            'name.required' => '代理店名を入力してください。',
            'name.max' => '100⽂字未満で⼊⼒してください',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しい形式のメールアドレス',
            'email.max' => '100⽂字未満で⼊⼒してください',
            'phone1.max' => '4⽂字未満で⼊⼒してください',
            'phone2.max' => '4⽂字未満で⼊⼒してください',
            'phone3.max' => '4⽂字未満で⼊⼒してください',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $agent = Agent::FindOrFail($id);
        }

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

    /**
     * check exist of a column
     *
     * @param  $column,$value
     * @return boolean
     */
    public function checkUniqueColumn($column,$value){
        $flag = false;
        if(empty($value)) return $flag;

        $agents = Agent::where($column, '=', $value)->first();
        if ($agents !== null) {
            $flag=true;
        }
        return $flag;
    }
}
