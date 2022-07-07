@extends('layouts.home')
@section('css')
    @include('layouts.datatables-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css"
          integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
@endsection
@section('css-agent')
    <link rel="stylesheet" href="{{ asset('css/agent.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{route('create')}}">
                        <i class="fas fa-plus-square"></i>
                    </a>
                </div><!--end card-header-->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered  dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                            <tr>
                                <td>{{$no + 1}}</td>
                                <td>{{ Str::limit($item->name, 13) }}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{ Str::limit($item->bank_code, 13) }}</td>
                                <td>{{ Str::limit($item->branch_code, 13) }}</td>
                                <td>{{ Str::limit($item->account_no, 13) }}</td>
                                <td>{{ Str::limit($item->curator, 13) }}</td>
                                <td>
                                    <a href="{{route('edit', $item->id)}}" class="btn"><i class="fas fa-edit"></i></a>
                                    <a class="delete-agent" data-id="{{$item->id}}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
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
    @include("layouts.message")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <script>
        $('.delete-agent').on('click', function (e) {
            e.preventDefault();
            let $id = $(this).attr("data-id");
            swal.fire({
                title: "よろしいですか︖",
                text: "を削除します。よろしいですか︖",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#6A9944",
                confirmButtonText: "OK",
                cancelButtonText: "キャンセル",
                closeOnConfirm: true
            }).then((isFlag) => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                if (isFlag.isConfirmed) {
                    $.ajax({
                        url: `agents/delete/${$id}`,
                        type: "DELETE",
                        cache: false,
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function (res) {
                            if (res === 'success') {
                                toastr.success("削除しました");
                                window.location.reload();
                            } else {
                                toastr.error("削除できません。");
                            }
                        }
                    });
                }
            });

        });
    </script>
    </script>
@endsection
