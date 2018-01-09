@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')
<div class="login-content">

        <!-- Login -->
        <div class="lc-block lc-block-alt toggled" id="l-password">

                <div class="lcb-form">

                        <h3 class="m-b-25 text-light">차검사 <strong>{{ trans("register.verify.title") }}</strong></h3>
                        <p class="text-muted">{!! trans("register.verify.send_message") !!}</p>

                        <p class="m-t-25">
                                <small class="text-muted text-light">COPYRIGHTS BY <strong>차검사</strong></small>
                        </p>
                </div>

        </div>

</div>

@endsection


@push( 'footer-script' )
@endpush
