@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.user')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="panel panel-default">

            <div class="panel-heading">
                <span class="panel-title">검색조건</span>

                {{--<div class="panel-heading-controls">--}}
                {{--<div class="checkbox checkbox-slider--b-flat zfp-panel-collapse">--}}
                {{--<label>--}}
                {{--<input type="checkbox" >--}}
                {{--<span></span>--}}
                {{--</label>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>

            <div class="panel-body">

                <form method="GET" class="form-horizontal no-margin-bottom" role="form">

                    <div class="form-group">
                        <label for="inputBoardId" class="control-label col-sm-3">{{ trans('admin/user.roles') }}</label>
                        <div class="col-sm-6">
                        {{--                        {!! Form::select('board_id', [null=>trans('common.search.first_select')] + $board_list, $request->query('board_id'), ['class'=>'form-control', 'id'=>'inputBoardId']) !!}--}}
                        <!--
                                                                        case 100: $code_msg = '주문취소';break;
                                                                        case 101: $code_msg = '발급대기';break;
                                                                        case 102: $code_msg = '주문완료';break;
                                                                        case 103: $code_msg = '주문요청';break;
                                                                        case 105: $code_msg = '차량입고';break;
                                                                -->
                            <button class="btn btn-default" name="role_cd" value="">전체</button>
                            <button class="btn btn-default" name="role_cd" value="1">관리자</button>
                            <button class="btn btn-default" name="role_cd" value="2">일반회원</button>
                            <button class="btn btn-default" name="role_cd" value="3">얼라이언스</button>
                            <button class="btn btn-default" name="role_cd" value="4">정비소</button>
                            <button class="btn btn-default" name="role_cd" value="5">엔지니어</button>
                            <button class="btn btn-default" name="role_cd" value="6">기술사</button>
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
                        <col width="10%">
                        <col width="15%" class="">
                        <col width="*">

                        <col width="15%" class="">
                        <col width="10%" class=" ">
                        <col width="10%">
                    </colgroup>

                    <thead>
                    <tr class="active">
                        <th class="text-center">#</th>
                        <th class="">이메일</th>
                        <th class="text-center">이름</th>
                        <th class="text-center">역할</th>
                        <th class="text-center">상태</th>
                        <!-- <th class="text-center">등록일</th> -->
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

                            <td class="">
                                {{ $data->id }}
                            </td>

                            <td class="text-left">
                                {{ $data->email }}
                            </td>

                            <td class="">
                                {{ $data->name }}
                            </td>

                            <td class="">
                                <span class="label label-default">{!! $data->roles->implode('display_name', '</span> <span class="label label-default">') !!}</span>
                            </td>

                            <td class="">
                                <span class="label label-info">{{ $data->status->display() }}</span>
                            </td>

                            <td>
                                <a href="{{ route('user.edit', $data->id) }}" class="btn btn-default"
                                   data-tooltip="{pos:'top'}" title="수정">수정</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>


        <div class="row">

            <div class="col-sm-6">

                <a href="{{ route('user.create') }}" class="btn btn-primary">등록</a>

            </div>

            <div class="col-sm-6 text-right">

                @if($role_cd)
                    {!! $entrys->appends(['role_cd' => $role_cd])->render() !!}
                @elseif($sf && $s)
                    {!! $entrys->appends([$sf => $s])->render() !!}
                @else
                    {!! $entrys->render() !!}
                @endif

            </div>

        </div>

    </div>
@endsection



@section( 'footer-script' )
    <script type="text/javascript">

    </script>
@endsection
