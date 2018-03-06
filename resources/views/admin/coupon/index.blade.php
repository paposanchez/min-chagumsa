@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">

            <a href="{{ route('coupon.create') }}" class="btn btn-float btn-primary m-btn"><i
                        class="zmdi zmdi-plus"></i></a>

            <div class="card">
                <div class="card-header ch-alt">
                    <h2>쿠폰 관리
                        <small>총 <strong class="text-primary">{{ number_format($entrys->total()) }}</strong>개의 검색결과가
                            있습니다.
                        </small>
                    </h2>
                    <ul class="actions">
                        <li>
                            <a href="#" class="download" id="download">
                                <i class="zmdi zmdi-download"></i>
                            </a>

                        </li>
                    </ul>
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
                                    <col width="8%">
                                    <col width="8%">
                                    <col width="15%">
                                    <col width="*">
                                    <col width="15%">
                                    <col width="10%">
                                    <col width="15%">
                                    <col width="15%">
                                </colgroup>

                                <thead>
                                <tr class="active">
                                    <th class="text-center"><a class="sort" href="#" id="status"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 상태</a></th>
                                    <th class="text-center"><a class="sort" href="#" id="is_used"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 사용여부</a></th>
                                    <th class="text-center">쿠폰종류</th>
                                    <th class="text-center">쿠폰번호</th>
                                    <th class="text-center">사용자</th>
                                    <th class="text-center">할인금액</th>
                                    <th class="text-center"><a class="sort" href="#" id="created_at"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 등록일</a></th>
                                    <th class="text-center"><a class="sort" href="#" id="updated_at"><i
                                                    class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 사용일</a></th>
                                    <th class="text-center">ReMark</th>
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
                                            'code' => $data->status_cd,
                                            'color' =>[
                                            '127' => 'success',
                                            '128' => 'default',
                                            '129' => 'danger',
                                            ]])
                                                {{ $data->status->display() }}
                                            @endcomponent
                                        </td>
                                        <td class="text-center">
                                            @component('components.badge', [
                                            'code' => $data->is_use,
                                            'color' =>[
                                            '0' => 'success',
                                            '1' => 'dange',
                                            ]])
                                                {{ ($data->is_use === 0)? '미사용': '사용' }}
                                            @endcomponent
                                        </td>
                                        <td class="text-center">{{ $data->coupon_kind}}</td>
                                        <td class="text-center">{{ $data->coupon_number }}</td>
                                        <td class="text-center">
                                            @if($data->user)
                                                {{ $data->user->name }}
                                                <br>
                                                <small class="text-info">{{ $data->user->mobile ? $data->user->mobile : '-' }}</small>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="text-center">{{ number_format($data->amount) }}원</td>
                                        <td class="text-center">{{ $data->created_at->format('m-d H:i') }}</td>
                                        <td class="text-center">{{ $data->updated_at->format('m-d H:i') }}</td>
                                        <td>
                                            <a href="#"
                                               class="btn btn-default btn-icon waves-effect waves-float detail"
                                               data-toggle="modal"
                                               data-target="#couponModal" data-id="{{ $data->id }}"
                                               title="결제정보 상세보기"><i class="zmdi zmdi-search-in-page"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{--page navigation--}}
                            {!! $entrys->appends(['status_cd' => $status_cd, $sf => $s, 'trs' => $trs, 'tre' => $tre, 'sort' => $sort, 'sort_orderby' => $sort_orderby])->render() !!}

                        </div>

                        <div role="tabpanel" class="tab-pane animated fadeIn m-t-20" id="tab-2">
                            <form method="GET" class="form-horizontal no-margin-bottom" role="form" id="frm">
                                <input type="hidden" name="sort" id="sort_val" value="{{ $sort }}">
                                <input type="hidden" name="sort_orderby" id="sort_orderby" value="{{ $sort_orderby }}">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">상태</label>

                                    <div class="col-sm-9">

                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default {{ $status_cd == '' ? 'active' : '' }}">
                                                {{ Form::radio('status_cd', '', \App\Helpers\Helper::isCheckd('', $status_cd), ['name' => 'status_cd']) }}
                                                전체
                                            </label>
                                            <label class="btn btn-default {{ $status_cd == 127 ? 'active' : '' }}">
                                                {{ Form::radio('status_cd', 127, \App\Helpers\Helper::isCheckd(127, $status_cd), ['name' => 'status_cd']) }}
                                                활성
                                            </label>
                                            <label class="btn btn-default {{ $status_cd == 128 ? 'active' : '' }}">
                                                {{ Form::radio('status_cd', 128, \App\Helpers\Helper::isCheckd(128, $status_cd), ['name' => 'status_cd']) }}
                                                비활성
                                            </label>
                                            <label class="btn btn-default {{ $status_cd == 129 ? 'active' : '' }}">
                                                {{ Form::radio('status_cd', 129, \App\Helpers\Helper::isCheckd(129, $status_cd), ['name' => 'status_cd']) }}
                                                만료
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">검색일자</label>
                                    <div class="col-sm-3">

                                        <div class="fg-line">
                                            <input type="text" class="form-control date-picker" name='trs'
                                                   value='{{ $trs }}'
                                                   placeholder="{{ trans('common.search.period_start') }}">
                                        </div>

                                    </div>

                                    <div class="col-sm-3">

                                        <div class="fg-line">
                                            <input type="text" class="form-control date-picker" name="tre" id="tre"
                                                   value="{{ $tre }}"
                                                   placeholder="{{ trans('common.search.period_end') }}">
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

    <!-- Coupon Modal -->
    <div id="couponModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="card">
                    <div class="card-header bgm-blue m-b-20">
                        <h2>결제 상세내용
                            <small></small>
                        </h2>
                        <ul class="actions actions-alt">
                            <li class="dropdown">
                                <a href="#">
                                    <i class="zmdi zmdi-close" data-dismiss="modal"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body card-padding">
                        {!! Form::open(['method' => 'PATCH','route' => ['coupon.update', 'id' => 0], 'class'=>'form-horizontal', 'id'=>'couponForm', 'enctype'=>"multipart/form-data"]) !!}
                        <input type="hidden" name="coupon_id" id="id" value="">
                        <div class="modal-body">
                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">상태</label>
                                {!! Form::select('status_cd', $coupon_status, [], ['class'=>'form-control','id' =>'status_cd', 'autocomplete'=>"off"]) !!}
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">사용여부</label>
                                <br>
                                <span class="label form-control-static" id="is_use"></span>
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">쿠폰종류</label>
                                <input type="text" class="form-control" id="coupon_kind" name="coupon_kind" placeholder="쿠폰이름을 입력해주세요." minlength="3" required>
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">할인금액</label>
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="할인금액을 입력해주세요." minlength="1" required>
                            </div>

                            <div class="fg-line m-b-25 {{ $errors->has('') ? 'has-error' : '' }} ">
                                <label for="" class=" fg-label">쿠폰번호</label>
                                <p class="form-control-static" id="coupon_number"></p>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="">변경</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(['method' => 'get', 'route' => ['coupon.excel-download'], 'id'=>'excel-download']) !!}
    <input type="hidden" name="ex_sf" id="" value="{{ $sf }}">
    <input type="hidden" name="ex_s" id="" value="{{ $s }}">
    <input type="hidden" name="ex_status_cd" id="" value="{{ $status_cd }}">
    {!! Form::close() !!}

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

        $(document).on('click', '.detail', function () {
            var id = $(this).data('id');
            var html = '';
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: '/coupon/get-detail',
                data: {
                    'id': id
                },
                success: function (data) {
                    $('#purchase_id').val(id);
                    $.each(data, function(key, value){
                        if(key == 'is_use'){
                            if(value.code == 1){
                                $('#'+key).addClass('label-default').text('사용');
                            }else{
                                $('#'+key).addClass('label-success').text('미사용');
                            }
                        }else if (key == 'coupon_number'){
                            $('#'+key).text(value);
                        }else{
                            $('#'+key).val(value);
                        }
                    });

                },
                error: function (data) {
                    alert(JSON.stringify(data));
                }
            });
        });

        $(document).on('click', '#download', function(){
            $('#excel-download').submit();
        });
    </script>
@endpush
