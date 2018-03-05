@extends( 'web.layouts.default' )

@section( 'content' )
<section id="content" class="content-alt">
        <div class="container">

                <div class="row">
                        <div class="col-md-12">
                                <div class="block  text-center m-t-10  m-b-20" >
                                        <!-- <h5 class="c-white">서브텍스트</h5> -->
                                        <h1 class="c-white">회원정보변경</h1>
                                        <hr class="line dark">
                                        <!-- <h3 class="c-white c-light">최종수정일 : 2018년 03월 01일</h3> -->
                                        <h6 class="c-white c-light ">최종수정일 : 2018년 03월 01일</h6>
                                </div>

                        </div>
                </div>

                <div class="card subnavigation">

                        <div class="card-body card-padding">

                                <div role="tabpanel">

                                        <ul class="tab-nav text-center fw-nav" role="tablist">
                                                <li><a href="{{ route('mypage.myorder.index') }}">나의주문</a></li>
                                                <li class="active"><a href="{{ route('mypage.profile.index') }}">회원정보변경</a></li>
                                                <li><a href="{{ route('mypage.leave.index') }}">회원탈퇴</a></li>
                                        </ul>

                                        <div class="tab-content">


                                                <form>
                                                        <fieldset class="m-t-20 m-b-20">

                                                                <div class="form-group fg-float m-b-30">
                                                                        <div class="fg-line">
                                                                                <input type="email" class="form-control input-sm" value="{{ Auth::user()->email }}">
                                                                                <label class="fg-label">Email address</label>
                                                                        </div>
                                                                </div>

                                                                <div class="form-group fg-float m-b-30">
                                                                        <div class="fg-line">
                                                                                <input type="email" class="form-control input-sm">
                                                                                <label class="fg-label">사용자명</label>
                                                                        </div>
                                                                </div>

                                                                <div class="form-group fg-float m-b-30">
                                                                        <div class="fg-line">
                                                                                <input type="email" class="form-control input-sm">
                                                                                <label class="fg-label">Contact Number</label>
                                                                        </div>
                                                                </div>

                                                                <button class="btn btn-info waves-effect">Submit</button>
                                                                <button class="btn btn-link waves-effect">Cancel</button>
                                                        </fieldset>
                                                </form>



                                        </div>

                                </div>

                        </div>

                </div>

        </div>
</section>
@endsection
