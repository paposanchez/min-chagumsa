@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">

        <div class="container">

            <div class="card">
                <div class="card-header ch-alt">
                    <h2>회원 관리
                        <small>총 <strong>{{ number_format($entrys->total()) }}</strong> 개의 검색결과가 있습니다.</small>
                    </h2>
                </div>


                <div class="card-body">

                    <ul class="tab-nav" role="tablist">
                        <li role="presentation" class="active">
                            <a class="col-sx-4" href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab"
                               aria-expanded="true">
                                검색목록
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a class="col-xs-4" href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab"
                               aria-expanded="false">
                                검색하기
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content p-t-0 p-b-20 p-r-0 p-l-0">

                        <div role="tabpanel" class="tab-pane animated fadeIn active" id="tab-1">
                            <table class="table">
                                <colgroup>
                                    <col width="8%">
                                    <col width="15%">
                                    <col width="*">
                                    <col width="8%">
                                    <col width="8%">
                                    <col width="10%">
                                    <col width="*">
                                </colgroup>
                                <thead>
                                <tr class="active">
                                    <th class="text-center"><a class="sort" href="#" id="id"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 회원번호</a></th>
                                    <th class="text-center">이름</th>
                                    <th class="text-center">회원정보</th>
                                    <th class="text-center">역할</th>
                                    <th class="text-center"><a class="sort" href="#" id="status"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 상태</a></th>
                                    <th class="text-center">등록일</th>
                                    <th class="text-center">Remarks</th>
                                </tr>
                                </thead>

                                <tbody>

                                @unless(count($entrys) >0)
                                    <tr>
                                        <td colspan="6" class="no-result">{{ trans('common.no-result') }}</td>
                                    </tr>
                                @endunless

                                @foreach($entrys as $n => $data)
                                    <tr>

                                        <td class="text-center">
                                            {{ $data->id }}
                                        </td>

                                        <td class="text-center">
                                            {{ $data->name }}
                                        </td>

                                        <td class="text-center">
                                            {{ $data->email }}
                                            <br/>
                                            <small class="text-warning">{{ $data->mobile ? $data->mobile : '-' }}</small>
                                        </td>


                                        <td class="text-center">
                                            <span class="label label-default">{!! $data->roles->implode('display_name', '</span> <span class="label label-default">') !!}</span>
                                        </td>

                                        <td class="text-center">
                                            <span class="label label-info">{{ $data->status->display() }}</span>
                                        </td>

                                        <td class="text-center">
                                            {{ $data->created_at }}
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('user.edit', $data->id) }}" class="btn btn-default"
                                               data-tooltip="{pos:'top'}" title="수정">수정</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--page navigation--}}
                            {!! $entrys->appends([$sf => $s, 'trs' => $trs, 'tre' => $tre, 'sort' => $sort, 'sort_orderby' => $sort_orderby])->render() !!}
                        </div>

                        <div role="tabpanel" class="tab-pane animated fadeIn m-t-20" id="tab-2">
                            <form method="GET" class="form-horizontal no-margin-bottom" role="form" id="frm">
                                <input type="hidden" name="sort" id="sort_val" value="{{ $sort }}">
                                <input type="hidden" name="sort_orderby" id="sort_orderby" value="{{ $sort_orderby }}">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">상태</label>

                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default {{ $role_cd == '' ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('role_cd', '', \App\Helpers\Helper::isCheckd('', $role_cd), ['name' => 'role_cd']) }}
                                            전체
                                        </label>
                                        <label class="btn btn-default {{ $role_cd == 1 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('role_cd', 1, \App\Helpers\Helper::isCheckd(1, $role_cd), ['name' => 'role_cd']) }}
                                            관리자
                                        </label>
                                        <label class="btn btn-default {{ $role_cd == 2 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('role_cd', 2, \App\Helpers\Helper::isCheckd(2, $role_cd), ['name' => 'role_cd']) }}
                                            일반회원
                                        </label>
                                        <label class="btn btn-default {{ $role_cd == 3 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('role_cd', 3, \App\Helpers\Helper::isCheckd(3, $role_cd), ['name' => 'role_cd']) }}
                                            얼라이언스
                                        </label>
                                        <label class="btn btn-default {{ $role_cd == 4 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('role_cd', 4, \App\Helpers\Helper::isCheckd(4, $role_cd), ['name' => 'role_cd']) }}
                                            정비소
                                        </label>
                                        <label class="btn btn-default {{ $role_cd == 5 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('role_cd', 5, \App\Helpers\Helper::isCheckd(5, $role_cd), ['name' => 'role_cd']) }}
                                            엔지니어
                                        </label>
                                        <label class="btn btn-default {{ $role_cd == 6 ? 'active' : '' }} selected_cd">
                                            {{ Form::radio('role_cd', 6, \App\Helpers\Helper::isCheckd(6, $role_cd), ['name' => 'role_cd']) }}
                                            기술사
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">검색일자</label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="zmdi zmdi-calendar-alt"></i></span>
                                            <div class="fg-line">
                                                <input type="text" class="form-control date-picker" name='trs'
                                                       value='{{ $trs }}'
                                                       placeholder="{{ trans('common.search.period_start') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                            <div class="fg-line">
                                                <input type="text" class="form-control date-picker" name="tre" id="tre"
                                                       value="{{ $tre }}"
                                                       placeholder="{{ trans('common.search.period_end') }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">검색어</label>
                                    <div class="col-sm-3">
                                        {!! Form::select('sf', $search_fields, $sf, ['class'=>'selectpicker']) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="fg-line">
                                            <input type="text" class="form-control input-sm" id="s" name="s"
                                                   placeholder="검색어" value="{{ $s }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">검색</button>
                                    </div>
                                </div>


                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection



@push( 'footer-script' )
    <script type="text/javascript">
        $('.sort').click(function () {
            var sort_value = $(this).attr('id');
            $('#sort_val').val(sort_value);
            if ($('#sort_orderby').val() == 'asc') {
                $('#sort_orderby').val('desc')
            } else {
                $('#sort_orderby').val('asc')
            }
            $('#frm').submit();
        });

        // $('.date-picker').datetimepicker({
        //     format: 'YYYY-MM-DD'
        // });
    </script>
@endpush
