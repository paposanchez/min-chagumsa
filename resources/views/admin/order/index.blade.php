@extends( 'admin.layouts.default' )

@section( 'content' )
<section id="content">

        <div class="container">

                <div class="card">
                        <div class="card-header">
                                <h2>주문관리
                                        <small>총 <strong>{{ number_format($entrys->total()) }}</strong> 개의 검색결과가 있습니다.</small>
                                </h2>

                                <ul class="actions">
                                        <li>
                                                <a href="#collapseExample" class=" waves-effect" type="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="zmdi zmdi-search"></i>
                                                </a>
                                        </li>
                                </ul>
                        </div>


                        <div class="card-body card-search" >

                                <div class="jumbotron m-0">

                                        <form class="form-horizontal" role="form">

                                                <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">상태</label>

                                                        <div class="col-sm-8">
                                                                <div class="fg-line">
                                                                        <select class="selectpicker" multiple>
                                                                                <option>Mustard</option>
                                                                                <option>Ketchup</option>
                                                                                <option>Relish</option>
                                                                                <option>Toasted</option>
                                                                        </select>
                                                                </div>


                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">검색일자</label>
                                                        <div class="col-sm-4">
                                                                <select class="selectpicker">
                                                                        <option>Mustard</option>
                                                                        <option>Ketchup</option>
                                                                        <option>Relish</option>
                                                                        <option>Toasted</option>
                                                                </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                                <div class="dtp-container">
                                                                        <input type='text' name="" class="form-control date-time-picker"
                                                                        placeholder="Click here...">
                                                                </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                                <div class="dtp-container">
                                                                        <input type='text' class="form-control date-time-picker"
                                                                        placeholder="Click here...">
                                                                </div>
                                                        </div>
                                                </div>


                                                <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">검색어</label>
                                                        <div class="col-sm-4">
                                                                <select class="selectpicker">
                                                                        <option>Mustard</option>
                                                                        <option>Ketchup</option>
                                                                        <option>Relish</option>
                                                                        <option>Toasted</option>
                                                                </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                                <div class="fg-line">
                                                                        <input type="text" class="form-control input-sm" id="inputEmail3" placeholder="검색어">
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


                                <table class="table">
                                        <colgroup>
                                                <col width="8%">
                                                <col width="13%">
                                                <col width="25%">
                                                <col width="25%">
                                                <col width="14%">
                                                <col width="*">
                                        </colgroup>
                                        <thead>
                                                <tr class="active">
                                                        <th class="text-center"><i class="fa fa-sort" aria-hidden="true"></i> <a href="#" id="sort">상태</a>
                                                        </th>
                                                        <th class="text-center">주문번호</th>
                                                        <th class="text-center">주문자정보</th>
                                                        <th class="text-center">결제정보</th>
                                                        <th class="text-center">결제일</th>
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
                                                        <td class="text-center">
                                                                @component('components.badge', [
                                                                'code' => $data->status_cd,
                                                                'color' =>[
                                                                '100' => 'default',
                                                                '106' => 'primary',
                                                                '109' => 'success'
                                                                ]])
                                                                {{ $data->status->display() }}
                                                                @endcomponent

                                                        </td>

                                                        <td class="text-center">
                                                                {{ $data->getOrderNumber() }}
                                                                <br/>
                                                                <small class="text-muted">{{ $data->car_number }}</small>
                                                        </td>

                                                        <td class="text-center">
                                                                <a href="/user/{{ $data->orderer_id }}/edit">{{ $data->orderer_name }} <span
                                                                        class="text-muted">{{ $data->orderer->email }}</span></a>
                                                                        <br/>
                                                                        <small class="text-warning">{{ $data->orderer_mobile }}</small>
                                                                </td>

                                                                <td class="text-center">
                                                                        <a href="/item">{{ $data->orderItem->item->name }} <span class="text-muted">{{ number_format($data->orderItem->item->price) }}
                                                                                원</span></a>
                                                                                <br/>
                                                                                <small class="text-warning">{{ $data->purchase ? $data->purchase->payment_type->display() : '' }}</small>
                                                                        </td>

                                                                        <td class="text-center">
                                                                                {{ $data->created_at->format('m-d H:i') }}
                                                                        </td>

                                                                        <td class="text-center">
                                                                                <a href="{{ url("order", [$data->id]) }}" class="btn btn-default"
                                                                                        data-toggle="tooltip" title="주문상세보기">상세보기</a>
                                                                                </td>
                                                                        </tr>
                                                                        @endforeach
                                                                </tbody>
                                                        </table>
                                                </div>

                                                {{--page navigation--}}
                                                {!! $entrys->render() !!}
                                        </div>

                                </div>
                        </section>
                        @endsection


                        @push( 'header-script' )
                        @endpush


                        @push( 'footer-script' )
                        @endpush
