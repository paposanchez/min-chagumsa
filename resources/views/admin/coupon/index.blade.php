@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.calculation')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="panel panel-default">

            <div class="panel-heading">
                <span class="panel-title">검색조건</span>

                <div class="panel-heading-controls">

                    <div class="checkbox checkbox-slider--b-flat zfp-panel-collapse">
                        <label>
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>

                </div>
            </div>

            <div class="panel-body">

                <form method="GET" class="form-horizontal no-margin-bottom" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-3">{{ trans('admin/order.period') }}</label>

                        <div class="col-sm-3">
                            <div class="input-group">
                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD"
                                       placeholder="{{ trans('common.search.period_start') }}" name='trs' value='{{ $trs }}'>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD"
                                       placeholder="{{ trans('common.search.period_end') }}" name='tre' value='{{ $tre }}'>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">{{ trans('common.search.keyword_field') }}</label>
                        <div class="col-sm-3">
                            {!! Form::select('sf', $search_fields, $sf, ['class'=>'form-control']) !!}

                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="{{ trans('common.search.keyword') }}"
                                   name='s' value='{{ $s }}'>
                        </div>
                    </div>

                    <div class="form-group no-margin-bottom">
                        <label class="control-label col-sm-3 sr-only">{{ trans('common.search.button') }}</label>
                        <div class="col-sm-4 col-sm-offset-3">
                            <button type="submit" class="btn btn-block btn-primary"><i
                                        class="fa fa-search"></i> {{ trans('common.search.button') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="row margin-bottom">

            <div class="col-md-12">


                <p class="form-control-static">
                    {!! trans('common.search-result', ['count' => '<span class="text-danger">'.number_format($entrys->total()).'</span>']) !!}
                </p>


                <table class="table text-middle text-center">
                    <colgroup>

                        <col width="5%">
                        {{--<col width="12%">--}}
                        {{--<col width="*">--}}
                        {{--<col width="30%">--}}
                        {{--<col width="15%">--}}
                        {{--<col width="8%">--}}

                    </colgroup>

                    <thead>
                    <tr class="active">
                        <th class="text-center">#</th>
                        <th class="text-left">쿠폰종류</th>
                        <th class="text-left">쿠폰번호</th>
                        <th class="text-center">사용여부</th>
                        <th class="text-center">사용자 정보</th>
                        <th class="text-center">등록일</th>
                        <th class="text-center">사용일</th>
                    </tr>
                    </thead>

                    <tbody>

                    @unless(count($entrys)>0)
                        <tr>
                            <td colspan="7" class="no-result"><p class="text-center">발행된 쿠폰이 없습니다.</p></td>
                        </tr>
                    @endunless

                    @foreach($entrys as $data)
                        <tr>
                            <td class=""><a href="">{{ $data->id }}</a></td>
                            <td class="text-left">{{ $data->coupon_kind}}</td>
                            <td class="text-left">{{ $data->coupon_number }}</td>
                            <td class="">{{ ($data->is_use === 0)? '미사용': '사용' }}</td>
                            <td class="">{!! ($data->users_id !== 0)? '<button class="btn btn-info btn-sm user-btn" type="button" data-users_id="'.$data->users_id.'">사용자 정보</button>': '-' !!}</td>
                            <td class="">{{ $data->created_at->format('Y-m-d') }}</td>
                            <td class="">{{ $data->updated_at?  $data->updated_at->format('Y-m-d H')."시" : '-'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="row">

            <div class="col-sm-6">

                <a href="{{ url('coupon/create') }}" class="btn btn-primary">등록</a>

            </div>

            <div class="col-sm-6 text-right">
                @if($sf && $s)
                    {!! $entrys->appends([$sf => $s])->render() !!}
                @elseif($trs && $tre)
                    {!! $entrys->appends(['trs' => $trs, 'tre' => $tre])->render() !!}
                @elseif($trs)
                    {!! $entrys->appends(['trs' => $trs])->render() !!}
                @elseif($tre)
                    {!! $entrys->appends(['tre' => $tre])->render() !!}
                @else
                    {!! $entrys->render() !!}
                @endif
            </div>

        </div>


        {{-- 사용자정보 modal --}}
        <div class="modal fade bs-example-modal-lg in order-modal" id="user-modal" tabindex="-1" role="dialog"
             aria-labelledby="order-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg form-group">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" id="myModalLabel">쿠폰 사용자 정보</h4>
                    </div>
                    <div class="modal-body">

                        <table class="table table-bordered">
                            <colgruup>

                            </colgruup>
                            <tbody>
                            <tr>
                                <th>성명</th>
                                <td id="user_name"></td>
                                <th>이메일</th>
                                <td id="user_email"></td>
                            </tr>
                            <tr>
                                <th>연락처</th>
                                <td id="user_mobile"></td>
                                <th>가입일</th>
                                <td id="user_at"></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection



@push( 'footer-script' )
    <script type="text/javascript">
        $(function () {
            $(".user-btn").on("click", function () {
                var users_id = $(this).data("users_id");
                $.ajax({
                    url: "coupon/user-info",
                    type: "post",
                    dataType: "json",
                    data: {'id': users_id},
                    success: function (jdata, textStatus, jqXHR) {
                        if (jdata.status == 'fail') {
                            alert(jdata.msg);
                        } else {
                            //사용자정보 모달을 뜨움.
                            $("#user_name").text(jdata.name);
                            $("#user_email").text(jdata.email);
                            $("#user_mobile").text(jdata.mobile);
                            $("#user_at").text(jdata.created_at);

                            $("#user-modal").modal();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('사용자 정보 수신을 실패하였습니다.')
                        /*
                        console.log("HTTP Request Failed");
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                        */
                    }
                });
            });
        });
    </script>
@endpush
