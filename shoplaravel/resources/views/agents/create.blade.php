@extends('layouts.home')
@section('css-agent')
    <link rel="stylesheet" href="{{ asset('css/agent.css') }}">
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">代理店名保存</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">代理店名 <span><i class="fa far fa-star"></i></span></label>
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
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
                        <input type="text" name="address" class="form-control" value="{{old('address')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="phone">電話番号</label>
                    <div class="col-sm-2">
                        <input  type="text" name="phone" class="form-control" value="{{old('address')}}">
                    </div>
                    <i  class="typcn typcn-minus"></i>
                    <div class="col-sm-2">
                        <input  type="text" name="phone" class="form-control" value="{{old('address')}}">
                    </div>
                    <i class="typcn typcn-minus"></i>
                    <div class="col-sm-2">
                        <input style="width: 82%" type="text" name="phone" class="form-control" value="{{old('address')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="email">メールアドレス<span><i class="fa far fa-star"></i></span></label>
                    <div class="col-sm-6">
                        <input type="text" name="email" class="form-control" value="{{old('email')}}">
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
                        <input type="text" name="bank_code" class="form-control" value="{{old('bank_code')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="branch_code">支店コード</label>
                    <div class="col-sm-6">
                        <input type="text" name="branch_code" class="form-control" value="{{old('branch_code')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="normal">普通/当座</label>
                    <div class="col-sm-6">
                        <input type="text" name="normal" class="form-control" value="{{old('normal')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="account_no">口座番号</label>
                    <div class="col-sm-6">
                        <input type="text" name="account_no" class="form-control" value="{{old('account_no')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="curator">担当者名</label>
                    <div class="col-sm-6">
                        <input type="text" name="curator" class="form-control" value="{{old('curator')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="line_url">LINE IDorURL</label>
                    <div class="col-sm-6">
                        <input type="text" name="line_url" class="form-control" value="{{old('line_url')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="margin_rate">マージン率</label>
                    <div class="col-sm-6">
                        <input type="text" name="margin_rate" class="form-control" value="{{old('margin_rate')}}">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-primary float-left  border-radius-5" href="#" style="margin-right: 5px">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary  border-radius-5">保存</button>
            </div>
        </form>
    </div>
@endsection
