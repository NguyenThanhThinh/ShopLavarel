<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{

    public function index()
    {
        $agents = Agent::orderBy('created_at', 'desc')->get();
        return view('agents.list', compact('agents'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => "required|max:100|email|unique:agents,email",
            'phone1' => 'max:4',
            'phone2' => 'max:4',
            'phone3' => 'max:4',
            'address' => 'max:255',
            'bank_code' => 'max:50',
            'branch_code' => 'max:50',
            'normal' => 'max:200',
            'account_no' => 'max:50',
            'curator' => 'max:200',
            'line_url' => 'max:200',
        ];
        $messages = [
            'name.required' => '代理店名を入力してください。',
            'name.max' => '255⽂字未満で⼊⼒してください',
            'address.max' => '255⽂字未満で⼊⼒してください',
            'bank_code.max' => '50⽂字未満で⼊⼒してください',
            'branch_code.max' => '50⽂字未満で⼊⼒してください',
            'normal.max' => '200⽂字未満で⼊⼒してください',
            'account_no.max' => '50⽂字未満で⼊⼒してください',
            'curator.max' => '200⽂字未満で⼊⼒してください',
            'line_url.max' => '200⽂字未満で⼊⼒してください',
            'email.unique' => 'メールアドレスを入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しい形式のメールアドレス',
            'email.max' => '100⽂字未満で⼊⼒してください',
            'phone1.max' => '4⽂字未満で⼊⼒してください',
            'phone2.max' => '4⽂字未満で⼊⼒してください',
            'phone3.max' => '4⽂字未満で⼊⼒してください'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            //dd($validator['data']);
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $data = $request->all();
            $data['phone'] = "";
            if (!empty($data['phone1']) || !empty($data['phone2']) || !empty($data['phone3'])) {
                $fullPhone = trim($data['phone1']) . '-' . trim($data['phone2']) . '-' . trim($data['phone3']);
                if (strlen($fullPhone) < 14) {
                    Session::flash('error', '電話番号が無効です');
                    return redirect()->back()->withErrors($validator)->withInput($request->input());
                }
            }
            if (!empty($data['phone1']) && !empty($data['phone2']) && !empty($data['phone3'])) {
                $fullPhone = trim($data['phone1']) . '-' . trim($data['phone2']) . '-' . trim($data['phone3']);
                $data['phone'] = $fullPhone;
            }
            Agent::create($data);
            Session::flash('success', '作成しました');
            return redirect()->route('agent_index');
        }
    }

    public function create()
    {
        return view('agents.create');
    }

    public function edit($id)
    {
        $agent = Agent::FindOrFail($id);
        if (!empty($agent['phone'])) {
            $arrayPhone = explode('-', $agent['phone']);
            $agent['phone1'] = $arrayPhone[0];
            $agent['phone2'] = $arrayPhone[1];
            $agent['phone3'] = $arrayPhone[2];
        } else {
            $agent['phone1'] = "";
            $agent['phone2'] = "";
            $agent['phone3'] = "";
        }

        return view('agents.edit', compact('agent'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:100',
            'email' => "required|max:100|email|unique:agents,email,$id",
            'phone1' => 'max:4|min:4',
            'phone2' => 'max:4|min:4',
            'phone3' => 'max:4|min:4',
            'address' => 'max:255',
            'bank_code' => 'max:50',
            'branch_code' => 'max:50',
            'normal' => 'max:200',
            'account_no' => 'max:50',
            'curator' => 'max:200',
            'line_url' => 'max:200'
        ];
        $messages = [
            'name.required' => '代理店名を入力してください。',
            'name.max' => '100⽂字未満で⼊⼒してください',
            'address.max' => '255⽂字未満で⼊⼒してください',
            'bank_code.max' => '50⽂字未満で⼊⼒してください',
            'branch_code.max' => '50⽂字未満で⼊⼒してください',
            'normal.max' => '200⽂字未満で⼊⼒してください',
            'account_no.max' => '50⽂字未満で⼊⼒してください',
            'curator.max' => '200⽂字未満で⼊⼒してください',
            'line_url.max' => '200⽂字未満で⼊⼒してください',
            'email.required' => 'メールアドレスを入力してください。',
            'email.unique' => 'メールアドレスを入力してください。',
            'email.email' => '正しい形式のメールアドレス',
            'email.max' => '100⽂字未満で⼊⼒してください',
            'phone1.min' => '4文字以上入力してください',
            'phone1.max' => '4⽂字未満で⼊⼒してください',
            'phone2.max' => '4⽂字未満で⼊⼒してください',
            'phone2.min' => '4文字以上入力してください',
            'phone3.max' => '4⽂字未満で⼊⼒してください',
            'phone3.min' => '4文字以上入力してください',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $agent = Agent::FindOrFail($id);
            $data = $request->all();
            $agent->phone = "";
            if (!empty($data['phone1']) || !empty($data['phone2']) || !empty($data['phone3'])) {
                $fullPhone = trim($data['phone1']) . '-' . trim($data['phone2']) . '-' . trim($data['phone3']);
                if (strlen($fullPhone) < 14) {
                    Session::flash('error', '電話番号が無効です');
                    return redirect()->back()->withErrors($validator)->withInput($request->input());
                }
            }
            if (!empty($data['phone1']) && !empty($data['phone2']) && !empty($data['phone3'])) {
                $fullPhone = trim($data['phone1']) . '-' . trim($data['phone2']) . '-' . trim($data['phone3']);
                $agent->phone = $fullPhone;
            }
            $agent->name = $request->input('name');
            $agent->email = $request->input('email');
            $agent->address = $request->input('address');
            $agent->bank_code = $request->input('bank_code');
            $agent->branch_code = $request->input('branch_code');
            $agent->normal = $request->input('normal');
            $agent->account_no = $request->input('account_no');
            $agent->curator = $request->input('curator');
            $agent->line_url = $request->input('line_url');
            $agent->margin_rate = $request->input('margin_rate');
            $agent->save();
            Session::flash('success', '更新しました');
            return redirect()->route('agent_index');
        }

    }

    public function delete($id)
    {
        $agent = Agent::find($id);
        if ($agent) {
            if ($agent->delete()) {
                return response('success', 200);
            } else {
                return response('error', 404);
            }
        } else {
            return response('error', 404);
        }
    }

}
