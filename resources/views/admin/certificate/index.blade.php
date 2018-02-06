@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>인증 관리
                        <small>검색 섬머리</small>
                    </h2>
                    <ul class="actions">
                        <li>
                            <a href="#collapseExample" class=" waves-effect" type="button" data-toggle="collapse"
                               aria-expanded="false" aria-controls="collapseExample">
                                <i class="zmdi zmdi-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="card-body card-search">

                    <div class="jumbotron m-0">

                        <form method="GET" class="form-horizontal no-margin-bottom" role="form" id="frm">
                            <input type="hidden" name="sort" id="sort_val" value="{{ $sort }}">
                            <input type="hidden" name="sort_orderby" id="sort_orderby" value="{{ $sort_orderby }}">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">상태</label>
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default {{ $status_cd == '' ? 'active' : '' }} selected_cd">
                                        {{ Form::radio('status_cd', '', \App\Helpers\Helper::isCheckd('', $status_cd), ['name' => 'status_cd']) }}
                                        전체
                                    </label>
                                    <label class="btn btn-default {{ $status_cd == 112 ? 'active' : '' }} selected_cd">
                                        {{ Form::radio('status_cd', 112, \App\Helpers\Helper::isCheckd(112, $status_cd), ['name' => 'status_cd']) }}
                                        신청
                                    </label>
                                    <label class="btn btn-default {{ $status_cd == 114 ? 'active' : '' }} selected_cd">
                                        {{ Form::radio('status_cd', 114, \App\Helpers\Helper::isCheckd(114, $status_cd), ['name' => 'status_cd']) }}
                                        검토중
                                    </label>
                                    <label class="btn btn-default {{ $status_cd == 115 ? 'active' : '' }} selected_cd">
                                        {{ Form::radio('status_cd', 115, \App\Helpers\Helper::isCheckd(115, $status_cd), ['name' => 'status_cd']) }}
                                        발급완료
                                    </label>
                                    <label class="btn btn-default {{ $status_cd == 116 ? 'active' : '' }} selected_cd">
                                        {{ Form::radio('status_cd', 117, \App\Helpers\Helper::isCheckd(117, $status_cd), ['name' => 'status_cd']) }}
                                        인증만료
                                    </label>
                                    <label class="btn btn-default {{ $status_cd == 120 ? 'active' : '' }} selected_cd">
                                        {{ Form::radio('status_cd', 120, \App\Helpers\Helper::isCheckd(120, $status_cd), ['name' => 'status_cd']) }}
                                        취소
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">검색일자</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-calendar-alt"></i></span>
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

                    <table class="table text-center">
                        <colgroup>
                            <col width="8%">
                            <col width="15%">
                            <col width="20%">
                            <col width="15%">
                            <col width="8%">
                            <col width="8%">
                            <col width="8%">
                            <col width="*">
                        </colgroup>

                        <thead>
                        <tr class="active">
                            <th class="text-center"><a class="sort" href="#" id="status"><i
                                            class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 상태</a></th>
                            <th class="text-center">주문번호</th>
                            <th class="text-center">주문자명</th>
                            <th class="text-center">기술사</th>
                            <th class="text-center"><a class="sort" href="#" id="created_at"><i
                                            class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 신청일</a></th>
                            <th class="text-center"><a class="sort" href="#" id="completed_at"><i
                                            class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 발급일</a></th>
                            <th class="text-center"><a class="sort" href="#" id="expired_at"><i
                                            class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 만료일</a></th>
                            <th class="text-center">Remarks</th>

                        </tr>
                        </thead>

                        <tbody>


                        @unless(count($entrys) >0)
                            <tr>
                                <td colspan="6" class="no-result">{{ trans('common.no-result') }}</td>
                            </tr>
                        @endunless

                        @foreach($entrys as $data)

                            <tr>

                                <td>
                                    @component('components.badge', [
                                    'code' => $data->status_cd,
                                    'color' =>[
                                    '120' => 'default',
                                    '102' => 'success',
                                    '112' => 'success',
                                    '113' => 'warning',
                                    '114' => 'info',
                                    '115' => 'primary',
                                    '116' => 'danger'
                                    ]])
                                        {{ $data->status->display() }}
                                    @endcomponent
                                </td>

                                <td class="text-center">
                                    {{ $data->chakey }}
                                    <br>
                                    <small class="text-warning">{{ $data->id }}</small>
                                </td>

                                <td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                        <a href="/user/{{ $data->order->orderer_id }}/edit">{{ $data->order->orderer_name }}</a>
                                    @else
                                        {{ $data->order->orderer_name }}
                                    @endif
                                    <a href="/user/{{ $data->order->orderer_id }}/edit">{{ $data->order->orderer_name }}</a>
                                    <br/>
                                    <small class="text-warning">{{ $data->order->orderer_mobile }}</small>
                                </td>

                                <td class="text-center">
                                    @if($data->technist)
                                        <a href="/user/{{ $data->technist_id }}/edit">{{ $data->technist->name }}</a>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="text-center">
                                    {{ $data->created_at->format('m-d H:i') }}
                                </td>

                                <td class="text-center">{{ $data->completed_at ? $data->completed_at->format('m-d H:i') : '-' }}</td>

                                <td class="text-center">
                                    {{ $data->getExpireDate() ? $data->getExpireDate()->format('Y-m-d H:i') : '-' }}

                                    @if($data->status_cd == 116)
                                        <br/>
                                        @if($data->isExpired())
                                            <small class="text-muted">만료됨</small>
                                        @else
                                            <small class="text-warning">
                                                {{ number_format($data->getCountdown()) }}일 남음
                                            </small>
                                        @endif
                                    @endif

                                </td>


                                <td class="text-center">
                                    @if($data->status_cd == 112)
                                        <button data-id="{{ $data->id }}" class="btn btn-danger certificate-assign"
                                                data-toggle="tooltip" title="인증서 발급시작">검토시작
                                        </button>
                                    @endif


                                    @if($data->status_cd == 114)
                                        <a href="/certificate/{{ $data->id }}/edit" class="btn btn-warning"
                                           data-toggle="tooltip" title="인증서 발급정보 수정">수정</a>
                                    @endif

                                    {{--<a href="/order/{{ $data->id }}" class="btn btn-default" data-toggle="tooltip"--}}
                                       {{--title="상세보기">상세보기</a>--}}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{--page navigation--}}
                {!! $entrys->appends(['sf' => $sf, 's' => $s, 'trs' => $trs, 'tre' => $tre, 'sort' => $sort, 'sort_orderby' => $sort_orderby])->render() !!}

            </div>

        </div>
    </section>
@endsection


@push( 'header-script' )
@endpush


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

        // 인증정보 승인처리 및 페이지 이동
        $(document).on('click', '.certificate-assign', function () {

            var id = $(this).data('id');
            if (confirm("인증서 발급을 시작하시겠습니까?")) {

                $('#loading').fadeIn();

                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '/certificate/' + id + '/assign',
                    success: function (data) {
                        if (data) {
                            location.href = "/certificate/" + id + '/edit';
                        } else {
                            alert("인증서 발급절차를 시작할 수 없습니다.\n이미 발급된 인증서인지 확인하세요.");

                        }

                        return data;
                    },
                    error: function (data) {
                        alert("인증서 발급절차를 시작할 수 없습니다.\n이미 발급된 인증서인지 확인하세요.");
                    },
                    complete: function () {
                        $('#loading').fadeOut();
                    }

                })
            }
        });
    </script>
@endpush
