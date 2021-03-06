@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-sm-4 col-sm-offset-4">

                <div class="tile tile-transparent shadow" style="margin-top:25%;">

                    <div class="tile-row">
                        <div class="tile-col text-center">
                            <h3 class="text-muted">Welcome to ZLARA+</h3>
                            <p class="text-muted">Perfectly designed and precisely prepared admin theme with over 50
                                pages with extra new web app views.</p>
                            <p class="text-muted">Login in. To see it in action.</p>

                        </div>
                    </div>

                    <div class="tile-row">
                        <div class="tile-col">

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="inputEmail" class="control-label sr-only">이메일</label>
                                    <div class="col-lg-12">
                                        <input type="email" class="form-control" placeholder="이메일" name="email"
                                               id="inputEmail">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        {{ $errors->first('email') }}
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="inputPassword" class="control-label sr-only">비밀번호</label>
                                    <div class="col-lg-12">
                                        <input type="password" class="form-control" placeholder="비밀번호" name="password"
                                               id="inputPassword">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        {{ $errors->first('password') }}
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="col-lg-12">
                                        <label class=""><input type="checkbox" name="remember_me"> 기억하기</label>
                                        <a class="pull-right link-muted" href="{{ url('/password/reset') }}">비밀번호
                                            분실?</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button class="btn btn-block btn-primary" data-loading-text="처리중..."
                                                type="submit">로그인
                                        </button>
                                    </div>
                                </div>


                                <hr>

                                <div class="form-group">
                                    <div class="col-lg-12">
                                        아직 회원이 아닌가요? <a href="{{ url('register') }}">회원가입?</a>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

                <p class="text-center">
                    <small class="text-muted text-light">Copyrights by <a target="_blank" href="/about">mixapply.com</a>
                        © 2015. All right reserved.
                    </small>
                </p>

            </div>

        </div>

    </div>

@endsection

@section( 'footer-script' )
    <script type="text/javascript">
    </script>
@endsection
