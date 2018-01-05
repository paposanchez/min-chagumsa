@extends( 'web.layouts.default' )

@section( 'content' )
<div class="hometainer hometainer-sub bgm-black text-center">
        <div class="container">
                <h1 class="c-white"> is a fully responsive landing page template</h1>
                <h4 class="c-white c-light">Zodkoo is a fully responsive landing page built using the latest Bootstrap framework. It's designed for describing your app, agency or business. The clean and well commented code allows easy customization of the theme.</h4>
                <a href="" class="btn btn-danger">Get Started</a>
        </div>
</div>

<section id="content" class="content-alt">

        <div class="container">

                <div class="card">
                        <div class="card-header ch-alt">
                                <h2>이메일 문의
                                        <!-- <small class="">총 12개의 게시물이 등록되어 있습니다.</small> -->
                                </h2>


                                <!-- <button class="btn bgm-green btn-float waves-effect"><i class="zmdi zmdi-plus"></i></button> -->
                        </div>

                        <div class="card-body card-padding">


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
