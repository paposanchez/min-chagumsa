@extends( 'web.layouts.default' )

@section( 'content' )
<section id="content" class="content-alt">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <div class="block  text-center m-t-10  m-b-20" >
                                        <!-- <h5 class="c-white">서브텍스트</h5> -->
                                        <h1 class="c-white">주문하기</h1>
                                        <!-- <hr class="line dark"> -->
                                        <!-- <h3 class="c-white c-light">총 <strong></strong>개의 공지사항이 등록되어 있습니다.</h3> -->
                                        <!-- <h6 class="c-white c-light ">업무시간 : 평일 오전 10시 ~ 18시</h6> -->
                                </div>

                        </div>
                </div>

                <div class="card subnavigation">

                        <div class="card-body">

                                <div class="row">

                                        <div class="col-md-8 p-r-0">

                                                <fieldset class="">

                                                        <h4 class="f-500 c-black p-20">상품선택</h4>
                                                        <hr>
                                                        <div class="form-group">
                                                                <div class="col-sm-12">
                                                                </div>
                                                        </div>



                                                        <h4 class="f-500 c-black m-t-20 p-20">주문정보</h4>
                                                        <hr>
                                                        <div class="form-group">
                                                                <div class="col-sm-12">
                                                                </div>
                                                        </div>

                                                        <h4 class="f-500 c-black m-t-20 p-20">결제정보</h4>
                                                        <hr>
                                                        <div class="form-group">
                                                                <div class="col-sm-12">
                                                                </div>
                                                        </div>



                                                </fieldset>

                                        </div>

                                        <div class="col-md-4 bgm-background" style="height:100%;">


                                                <fieldset class="p-20">
                                                        <h4 class="f-500 c-black">결제정보</h4>

                                                        <hr>

                                                        <div class="block">

                                                        </div>


                                                        <div class="form-group">
                                                                <div class="col-sm-12">
                                                                        <div class="checkbox">
                                                                                <label>
                                                                                        <input type="checkbox" value="">
                                                                                        <i class="input-helper"></i>
                                                                                        약관1
                                                                                </label>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="form-group">
                                                                <div class="col-sm-12">
                                                                        <div class="checkbox">
                                                                                <label>
                                                                                        <input type="checkbox" value="">
                                                                                        <i class="input-helper"></i>
                                                                                        약관
                                                                                </label>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="form-group">
                                                                <div class="col-sm-12">
                                                                        <button class="btn btn-info btn-block btn-lg">결제하기</button>
                                                        
                                                                </div>
                                                        </div>


                                                </fieldset>



                                        </div>

                                </div>


                        </div>

                </div>

        </div>

</section>
@endsection
