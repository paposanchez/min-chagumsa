@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')
<div class="login-content">

        <!-- Login -->
        <div class="lc-block lc-block-alt toggled" id="l-password">

                <div class="lcb-form">

                        {!! Form::open(['route' => ["register.resent"], 'class' =>'form', 'method' => 'post', 'role' => 'form', 'id' => 'resendFrm']) !!}

                        <h3 class="m-b-25 text-light">차검사 <strong>{{ trans("register.verify.title") }}</strong></h3>
                        <p class="text-muted">{!! trans('register.verify.resend_message') !!}</p>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                        <div class="fg-line">
                                                <input type="email" class="form-control" placeholder="{{ trans('register.email') }}" name="email" id="inputEmail">
                                        </div>
                                </div>

                                @if ($errors->has('email'))
                                <small class="help-block">{{ $errors->first('email')  }}</small>
                                @endif
                        </div>

                        <p class="text-center">
                                <button data-loading-text="처리중..." type="submit" class="btn btn-success  btn-block btn-lg" >인증메일 재발송</button>
                        </p>

                        {!! Form::close() !!}


                        <p class="m-t-25">
                                <small class="text-muted text-light">COPYRIGHTS BY <strong>차검사</strong></small>
                        </p>
                </div>

        </div>

</div>

@endsection


@push( 'footer-script' )
@endpush
