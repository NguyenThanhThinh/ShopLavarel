@extends('layouts.home')
@section('css-agent')
    <link rel="stylesheet" href="{{ asset('css/agent.css') }}">
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">代理店登録修正する</h3>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('edit', $agent->id)}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">代理店名 <span><i
                                class="fa far fa-star"></i></span></label>
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control"
                               value="{{old('name') ? old('name') : $agent->name}}">
                    </div>
                    <div class="col-sm-4">
                        @error('name')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="address">住所</label>
                    <div class="col-sm-6">
                        <input type="text" name="address" class="form-control"
                               value="{{old('address') ? old('address') : $agent->address}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="phone">電話番号</label>
                    <div class="col">
                        <input type="number"  name="phone1" placeholder="0909" class="form-control"
                               value="{{old('phone1') ? old('phone1') : $agent->phone1}}">
                        @error('phone1')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                    <i class="typcn typcn-minus"></i>
                    <div class="col">
                        <input type="number" name="phone2" placeholder="1234" class="form-control"
                               value="{{old('phone2') ? old('phone2') : $agent->phone2}}">
                        @error('phone2')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                    <i class="typcn typcn-minus"></i>
                    <div class="col">
                        <input type="number" name="phone3" placeholder="5678" class="form-control"
                               value="{{old('phone3') ? old('phone3') : $agent->phone3}}">
                        @error('phone3')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        @if (Session::has('error'))
                            <p class="text-red"> {{ Session::get('error') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="email">メールアドレス<span><i
                                class="fa far fa-star"></i></span></label>
                    <div class="col-sm-6">
                        <input type="text" name="email" class="form-control"
                               value="{{old('email') ? old('email') : $agent->email}}">
                    </div>
                    <div class="col-sm-4">
                        @error('email')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="bank_code">銀行コード</label>
                    <div class="col-sm-6">
                        <input type="text" name="bank_code" class="form-control"
                               value="{{old('bank_code') ? old('bank_code') : $agent->bank_code}}">
                    </div>
                    <div class="col-sm-4">
                        @error('bank_code')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="branch_code">支店コード</label>
                    <div class="col-sm-6">
                        <input type="text" name="branch_code" class="form-control"
                               value="{{old('branch_code') ? old('branch_code') : $agent->branch_code}}">
                    </div>
                    <div class="col-sm-4">
                        @error('branch_code')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="normal">普通/当座</label>
                    <div class="col-sm-6">
                        <input type="text" name="normal" class="form-control"
                               value="{{old('normal') ? old('normal') : $agent->normal}}">
                    </div>
                    <div class="col-sm-4">
                        @error('normal')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="account_no">口座番号</label>
                    <div class="col-sm-6">
                        <input type="text" name="account_no" class="form-control"
                               value="{{old('account_no') ? old('account_no') : $agent->account_no}}">
                    </div>
                    <div class="col-sm-4">
                        @error('account_no')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="curator">担当者名</label>
                    <div class="col-sm-6">
                        <input type="text" name="curator" class="form-control"
                               value="{{old('curator') ? old('curator') : $agent->curator}}">
                    </div>
                    <div class="col-sm-4">
                        @error('curator')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="line_url">LINE IDorURL</label>
                    <div class="col-sm-6">
                        <input type="text" name="line_url" class="form-control"
                               value="{{old('line_url') ? old('line_url') : $agent->line_url}}">
                    </div>
                    <div class="col-sm-4">
                        @error('line_url')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="margin_rate">マージン率</label>
                    <div class="col-sm-6">
                        <input type="text" name="margin_rate" class="form-control"
                               value="{{old('margin_rate') ? old('margin_rate') : $agent->margin_rate}}">
                    </div>
                    <div class="col-sm-4">
                        @error('margin_rate')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-primary float-left  border-radius-5" href="{{route('agent_index')}}"
                   style="margin-right: 5px">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary  border-radius-5">保存</button>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
    <script>
        (function () {
            $("input[name='margin_rate']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                maxboostedstep: 10,
                postfix: '%'
            });
        })();
    </script>
@endsection
