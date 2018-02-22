@extends( 'web.layouts.blank' )

@section('content')
    <div class="login-content">

        <!-- Login -->
        <div class="lc-block lc-block-alt toggled" id="l-password">

            <div class="lcb-form">
                {!! Form::open(['route' => 'mypage.myorder.confirm-check', 'class' =>'form', 'method' => 'post', 'role' => 'form', 'id'=>'login-form']) !!}
                <input type="hidden" name="diagnosis_id" value="{{ $diagnosis->id }}">
                <h3 class="m-b-25 text-light">차검사 <strong>예약확정</strong></h3>
                <p class="text-muted">
                    {{ trans("diagnosis.confirm") }}
                </p>

                <div class="form-group fg-float {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="fg-line">
                        <h4>{{ $garage_name }}</h4>
                        <h3>{{ $reservation_at }}</h3>
                    </div>
                    <small class="text-muted">확정날짜를 변경하시려면 차검사 고객센터(1833-6889)에 문의해주세요.</small>
                </div>

                <p class="text-center">
                    <button data-loading-text="처리중..." type="submit" class="btn btn-success  btn-block btn-lg">예약 확정
                    </button>
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
    <script type="text/javascript">
    </script>
@endpush
