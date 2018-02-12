@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">

            <a href="{{ route('coupon.create') }}" class="btn btn-float btn-primary m-btn"><i
                        class="zmdi zmdi-plus"></i></a>

            <div class="card">
                <div class="card-header ch-alt">
                    <h2>쿠폰 관리
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
                            <table class="table text-center">
                                <colgroup>
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="*">
                                    <col width="15%">
                                    <col width="10%">
                                    <col width="15%">
                                    <col width="15%">
                                </colgroup>

                                <thead>
                                <tr class="active">
                                    <th class="text-center"><a class="sort" href="#" id="is_use"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 상태</a></th>
                                    <th class="text-center">쿠폰종류</th>
                                    <th class="text-center">쿠폰번호</th>
                                    <th class="text-center">사용자</th>
                                    <th class="text-center">할인금액</th>
                                    <th class="text-center"><a class="sort" href="#" id="created_at"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 등록일</a></th>
                                    <th class="text-center"><a class="sort" href="#" id="updated_at"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 사용일</a></th>
                                </tr>
                                </thead>

                                <tbody>

                                @unless($entrys)
                                    <tr>
                                        <td colspan="6" class="no-result">발행된 쿠폰이 없습니다.</td>
                                    </tr>
                                @endunless

                                @foreach($entrys as $data)
                                    <tr>
                                        <td class="text-center">
                                            @component('components.badge', [
                                            'code' => $data->is_use,
                                            'color' =>[
                                            '0' => 'success',
                                            '1' => 'default',
                                            ]])
                                                {{ ($data->is_use === 0)? '미사용': '사용' }}
                                            @endcomponent
                                        </td>
                                        <td class="text-center">{{ $data->coupon_kind}}</td>
                                        <td class="text-center">{{ $data->coupon_number }}</td>
                                        <td class="text-center">{{ $data->user ? $data->user->name : '-' }}</td>
                                        <td class="text-center">{{ $data->amount }}</td>
                                        <td class="text-center">{{ $data->created_at }}</td>
                                        <td class="text-center">{{ $data->updated_at }}</td>
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

        // $('.date-picker').datetimepicker({
        //     format: 'YYYY-MM-DD'
        // });
    </script>
@endpush
