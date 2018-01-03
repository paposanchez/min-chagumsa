@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
@endsection

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2>Table</h2>

                <ul class="actions">
                    <li>
                        <a href="">
                            <i class="zmdi zmdi-trending-up"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="zmdi zmdi-check-all"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="">Refresh</a>
                            </li>
                            <li>
                                <a href="">Manage Widgets</a>
                            </li>
                            <li>
                                <a href="">Widgets Settings</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Basic Table
                        <small>Basic example without any additional modification classes</small>
                    </h2>
                </div>

                <div class="card-body">


                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                <label for="" class="control-label col-md-3">주문 생성자</label>

                                <div class="col-md-3">
                                    {!! Form::select('user_id', $users, ['class'=>'form-control', 'id'=>'user_id']) !!}
                                    <span class="help-block">ex) 유저 2 (user@2by.kr) => 주문하는 유저 seq 번호 </span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                <label for="" class="control-label col-md-3">정비소 번호</label>
                                <div class="col-md-3">
                                    {!! Form::select('garage_id', $garages, ['class'=>'form-control', 'id'=>'garage_id']) !!}
                                    <span class="help-block">ex) 정비소 4 (moon@2by.kr) => 주문하고자 하는 정비소 번호 </span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                                <label for="" class="control-label col-md-3">차량번호</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="차량번호 ex) 00허0000"
                                           name="car_number"
                                           id="car_number" value="">
                                    <span class="help-block">ex) 00허000</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button class="btn btn-primary"
                                            data-loading-text="{{ trans('common.button.loading') }}"
                                            id="create_order" type="button">주문 생성하기
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection


@push( 'header-script' )
@endpush


@push( 'footer-script' )
@endpush
