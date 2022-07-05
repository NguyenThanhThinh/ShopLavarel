@extends('layouts.home')
@section('css')
    @include('layouts.datatables-css')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   <button class="btn btn-primary">
                       <i class="fas fa-plus-square"></i>
                   </button>
                </div><!--end card-header-->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>代理店名</th>
                            <th>電話番号</th>
                            <th>銀行コード</th>
                            <th>支店コード</th>
                            <th>口座番号</th>
                            <th>担当者名</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agents as $no => $item)
                            <td>{{$no + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->bank_code}}</td>
                            <td>{{$item->branch_code}}</td>
                            <td>{{$item->account_no}}</td>
                            <td>{{$item->curator}}</td>
                            <td style="text-align: center">
                                <a href="#" class="btn"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection


@section('js')
    @include("layouts.datatables-js")
@endsection
