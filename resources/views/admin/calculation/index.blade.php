@extends( 'admin.layouts.default' )

@section( 'content' )
<section id="content">

        <div class="container">

                <div class="card">
                        <div class="card-header ch-alt">
                                <h2>정산 관리
                                        <small>총 <strong>{{ number_format($entrys->total()) }}</strong> 개의 검색결과가 있습니다.</small>
                                </h2>
                        </div>


                        <div class="card-body card-search">

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
                                                <col width="8%">
                                                <col width="15%">
                                                <col width="10%">
                                                <col width="10%">
                                                <col width="10%">
                                                <col width="10%">
                                                <col width="10%">
                                                <col width="*">
                                        </colgroup>

                                        <thead>
                                                <tr class="">
                                                        <th class="text-center">상태</th>
                                                        <th class="text-center">정산번호</th>
                                                        <th class="text-center">정산대상</th>
                                                        <th class="text-center">정산가액</th>
                                                        <th class="text-center">공제금액</th>
                                                        <th class="text-center">정산금액</th>
                                                        <th class="text-center">정산신청일</th>
                                                        <th class="text-center">정산완료일</th>
                                                        <th class="text-center">Remarks</th>
                                                </tr>
                                        </thead>

                                        <tbody>

                                                @unless(count($entrys) >0)
                                                <tr>
                                                        <td colspan="9" class="no-result">{{ trans('common.no-result') }}</td>
                                                </tr>
                                                @endunless

                                                @foreach($entrys as $data)
                                                <tr>
                                                        <td>{{ $data->status->display() }}</td>
                                                        <td>{{ $data->id }}</td>
                                                        <td>{{ $data->user->name }}</td>
                                                        <td>{{ $data->subtotal }}</td>
                                                        <td>{{ $data->deduction }}</td>
                                                        <td>{{ $data->amount }}</td>
                                                        <td>{{ $data->created_at }}</td>
                                                        <td>{{ $data->updated_at }}</td>
                                                        <td>
                                                                <button class="btn btn-warning" data-toggle="tooltip" title="상세목록">상세목록</button>
                                                                <button class="btn btn-warning" data-toggle="tooltip" title="정산취소">취소</button>
                                                                <button class="btn btn-warning" data-toggle="tooltip" title="정산완료">완료</button>
                                                        </td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                </table>
                                {{--page navigation--}}
                                {!! $entrys->appends([$sf => $s, 'trs' => $trs, 'tre' => $tre])->render() !!}
                        </div>

                        <div role="tabpanel" class="tab-pane animated fadeIn m-t-20" id="tab-2">
                                <form method="GET" class="form-horizontal no-margin-bottom" role="form" id="frm">
                                        <input type="hidden" name="sort" id="sort_val" value="">
                                        <input type="hidden" name="sort_orderby" id="sort_orderby"
                                        value="{{ old('order_number') ? old('order_number') : 'asc' }}">
                                        <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">상태</label>

                                                <div class="btn-group" data-toggle="buttons">
                                                        <label class="btn btn-default {{ $type_cd == '' ? 'active' : '' }}">
                                                                {{ Form::radio('type_cd', '', ('' == $type_cd)) }}
                                                                전체
                                                        </label>
                                                        <label class="btn btn-default {{ $type_cd == 121 ? 'active' : '' }}">
                                                                {{ Form::radio('type_cd', 1, (121 == $type_cd)) }}
                                                                진단
                                                        </label>
                                                        <label class="btn btn-default {{ $type_cd == 122 ? 'active' : '' }}">
                                                                {{ Form::radio('type_cd', 2, (122 == $type_cd)) }}
                                                                평가
                                                        </label>
                                                        <label class="btn btn-default {{ $type_cd == 123 ? 'active' : '' }}">
                                                                {{ Form::radio('type_cd', 3, (123 == $type_cd)) }}
                                                                보증
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


@push( 'header-script' )
@endpush


@push( 'footer-script' )
@endpush
