@extends( 'web.layouts.default' )

@section( 'content' )
<section id="content" class="content-alt">
        <div class="container">

                <div class="row">
                        <div class="col-md-12">
                                <div class="block  text-center m-t-10  m-b-20" >
                                        <!-- <h5 class="c-white">서브텍스트</h5> -->
                                        <h1 class="c-white">나의주문</h1>
                                        <hr class="line dark">
                                        <!-- <h3 class="c-white c-light">최종수정일 : 2018년 03월 01일</h3> -->
                                        <h6 class="c-white c-light ">총  <strong class="">{{ number_format(12) }}</strong>개의 주문이 등록되어 있습니다.</h6>
                                </div>

                        </div>
                </div>

                <div class="card subnavigation">

                        <div class="card-body card-padding">

                                <div role="tabpanel">

                                        <ul class="tab-nav text-center fw-nav" role="tablist">
                                                <li class="active"><a href="{{ route('mypage.myorder.index') }}">나의주문</a></li>
                                                <li><a href="{{ route('mypage.profile.index') }}">회원정보변경</a></li>
                                                <li><a href="{{ route('mypage.leave.index') }}">회원탈퇴</a></li>
                                        </ul>

                                        <div class="tab-content">


                                                <table class="table text-center">
                                                    <colgroup>
                                                        <col width="8%">
                                                        <col width="20%">
                                                        <col width="10%">
                                                        <col width="12%">
                                                        <col width="10%">
                                                        <col width="10%">
                                                        <col width="*">
                                                    </colgroup>
                                                    <thead>
                                                    <tr class="">
                                                        <th class="text-center"><a class="sort" href="#" id="status"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 상태</a></th>
                                                        <th class="text-center">주문번호</th>
                                                        <th class="text-center">주문자정보</th>
                                                        <th class="text-center">결제정보</th>
                                                        <th class="text-center">주문상품</th>
                                                        <th class="text-center"><a class="sort" href="#" id="created_at"><i class="zmdi zmdi-unfold-more" aria-hidden="true"></i> 결제일</a></th>
                                                        <th class="text-center">Remarks</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>

                                                    @unless(count($entrys) >0)
                                                        <tr>
                                                            <td colspan="7" class="no-result">{{ trans('common.no-result') }}</td>
                                                        </tr>
                                                    @endunless

                                                    @foreach($entrys as $data)
                                                        <tr>
                                                            <td>
                                                                @component('components.badge', [
                                                                'code' => $data->status_cd,
                                                                'color' =>[
                                                                '100' => 'default',
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

                                                            <td>
                                                                {{ $data->chakey }}
                                                                <br>
                                                                <small class="text-info">{{ $data->id }}</small>
                                                            </td>

                                                            <td>
                                                                <a href="/user/{{ $data->orderer_id }}/edit">{{ $data->orderer_name }}</a>
                                                                <br/>
                                                                <small class="text-info">{{ $data->orderer_mobile }}</small>
                                                            </td>

                                                            <td>
                                                                {{ $data->purchase_id }}
                                                                <br/>
                                                                <small class="text-info">{{ $data->purchase ? $data->purchase->payment_type->display() : '' }}</small>
                                                            </td>

                                                            <td>
                                                                @foreach($data->orderItem as $order_item)
                                                                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                                                        <a href="/config/item/{{ $order_item->item->id }}/edit"
                                                                           data-toggle="tooltip"
                                                                           title="{{ $order_item->item->type->display() }}"
                                                                           class="badge">{{ $order_item->item->typeString() }}</a>
                                                                    @else
                                                                        <span data-toggle="tooltip"
                                                                              title="{{ $order_item->item->type->display() }}"
                                                                              class="badge">{{ $order_item->item->typeString() }}</span>
                                                                    @endif

                                                                @endforeach
                                                            </td>


                                                            <td>
                                                                {{ $data->created_at->format('m-d H:i') }}
                                                            </td>

                                                            <td>

                                                                <a href="{{ url("order", [$data->id]) }}"
                                                                   class="btn btn-default btn-icon waves-effect waves-float"
                                                                   data-toggle="tooltip" title="주문상세보기"><i
                                                                            class="zmdi zmdi-search-in-page"></i></a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                                {{--page navigation--}}
                                                {!! $entrys->render() !!}


                                        </div>

                                </div>

                        </div>

                </div>

        </div>
</section>
@endsection
