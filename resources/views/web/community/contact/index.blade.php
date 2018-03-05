@extends( 'web.layouts.default' )

@section( 'content' )
<section id="content" class="content-alt">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <div class="block  text-center m-t-10  m-b-20" >
                                        <!-- <h5 class="c-white">서브텍스트</h5> -->
                                        <h1 class="c-white">문의사항</h1>
                                        <hr class="line dark">
                                        <!-- <h3 class="c-white c-light">총 <strong></strong>개의 공지사항이 등록되어 있습니다.</h3> -->
                                        <h6 class="c-white c-light ">업무시간 : 평일 오전 10시 ~ 18시</h6>
                                </div>

                        </div>
                </div>

                <div class="card subnavigation">


                        <div class="card-body card-padding">

                                <div role="tabpanel">

                                        <ul class="tab-nav text-center fw-nav" role="tablist">
                                                <li><a href="{{ route('notice.index') }}">공지사항</a></li>
                                                <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                                                <li class="active"><a href="{{ route('contact.index') }}">문의사항</a></li>
                                        </ul>

                                        <div class="tab-content p-t-0">

                                                {!! Form::open(['method' => 'GET','route' => ['register'], 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data", "autocomplete" => "off", 'role' => 'form', 'id'=>'join-form']) !!}


                                                <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-2 control-label">이메일</label>
                                                        <div class="col-sm-6">
                                                                <div class="fg-line">
                                                                        <input type="text" class="form-control input-lg" placeholder="이메일">
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-2 control-label">이름</label>
                                                        <div class="col-sm-6">
                                                                <div class="fg-line">
                                                                        <input type="text" class="form-control input-lg" placeholder="이름">
                                                                </div>
                                                        </div>
                                                </div>


                                                <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                                                        <div class="col-sm-10">
                                                                <div class="fg-line">
                                                                        <div id="wysiwig-contact" class="html-editor"></div>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                                <button class="btn btn-lg btn-success waves-effect" data-loading-text="처리중..." type="submit">등록</button>
                                                        </div>
                                                </div>

                                                {!! Form::close() !!}



                                        </div>
                                </div>
                        </div>

                </div>
        </div>
</section>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
$(function () {



        $('#wysiwig-contact').summernote({
                height: 250
        });

});
</script>
@endpush
