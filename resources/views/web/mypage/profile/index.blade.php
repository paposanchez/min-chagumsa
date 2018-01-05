@extends( 'web.layouts.default' )

@section( 'content' )
<section id="content" class="content-alt">

        <div class="container">

                <h1>회원정보변경</h1>

                <div class="row">

                        <div class="col-sm-4">
                                <h3 class="text-light m-t-0">안전한 비밀번호를 선택했는지 확인</h3>
                                <h4 class="text-light">안전한 비밀번호는 숫자, 문자, 기호가 조합되어 있으며 예측하기가 어렵고 실제 단어와 비슷하지 않으며 이 계정에만 사용되는 비밀번호입니다.</h4>
                        </div>

                        <div class="col-sm-8">

                                <div class="card">

                                        <img src="/assets/img/background.jpg" class="img-responsive" alt="" style="width:100%;height:200px;">

                                        <div class="card-body card-padding">

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
                                        </div>
                                </div>

                        </div>

                </div>


                <hr>


                <h1 class="m-b-10">서비스탈퇴</h1>

                <div class="row">

                        <div class="col-sm-4">
                                <h3 class="text-light m-t-0">안전한 비밀번호를 선택했는지 확인</h3>
                                <h4 class="text-light">안전한 비밀번호는 숫자, 문자, 기호가 조합되어 있으며 예측하기가 어렵고 실제 단어와 비슷하지 않으며 이 계정에만 사용되는 비밀번호입니다.</h4>
                        </div>

                        <div class="col-sm-8">

                                <div class="card">
                                        <!-- <div class="card-header ch-alt">
                                        <h2>Sample Form
                                        <small>Pellentesque ac lectus sed elit dictum vehicula</small>
                                </h2>
                        </div> -->

                        <img src="/assets/img/background.jpg" class="img-responsive" alt="" style="width:100%;height:200px;">

                        <div class="card-body card-padding">


                                <div class="form-group fg-float">
                                        <div class="fg-line">
                                                <textarea class="form-control auto-size input-sm" style="overflow: hidden; word-wrap: break-word; height: 43px;"></textarea>
                                                <label class="fg-label">Message</label>
                                        </div>
                                </div>

                                <button class="btn btn-info waves-effect">Submit</button>
                                <button class="btn btn-link waves-effect">Cancel</button>
                        </div>
                </div>

        </div>

</div>




</div>
</section>
@endsection
