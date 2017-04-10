@extends( 'web.layouts.default' )

@section( 'content' )
<section class="block bg-primary dark">
        <div class="container container-center">
                <div class="text-center padding-vertical-large">
                        <h1 class="text-lighter">인증서조회 / <span class="">조회</span></h1>
                        <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
        </div>
</section>

<div class="container">

        <div class="row">

                <div class="col-md-12">

                        <h1 class="text-center">검색하실 차량의 인증번호를 입력하세요.</h1>
                        <!-- <p>가장 최근에 발급된 인증서 이외의 정보는 <a href="">인증서 이력조회</a>로 조회하세요.</p> -->
                        <!-- <hr> -->



                        <form class="form-horizontal" method="post" action="{{ url('/certification/show') }}" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                {!! method_field('GET') !!}

                                <fieldset>
                                        <div class="form-group form-group-lg {{ $errors->has('email') ? 'has-error' : '' }}">
                                            <label for="inputEmail" class="control-label sr-only">이메일</label>
                                            <div class="col-lg-6 col-lg-offset-3">
                                                <input type="text" id="form-h-it" placeholder="인증서번호" class="form-control">

                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    {{ $errors->first('email') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-6 col-lg-offset-3">
                                                <button class="btn btn-lg btn-block btn-primary">검색</button>
                                            </div>
                                        </div>
                                </fieldset>

                        </form>

                </div>

        </div>

</div>
@endsection
