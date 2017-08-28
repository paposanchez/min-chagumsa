@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.sms')])
@endsection

@section( 'content' )
<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">
            <form class="form-horizontal">
            <fieldset>
                <div class="form-group {{ $errors->has('mobiles') ? 'has-error' : '' }}">
                    <label for="inputSubject" class="control-label col-md-3">휴대폰 번호</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="ex) 010-0000-0000,010-0000-0001" name="mobiles" id="mobiles" value="">
                        <span class="help-block">* 여러명 보낼 시 ex) 010-0000-0000,010-0000-0001</span>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    <label for="inputContent" class="control-label col-md-3">내용</label>
                    <div class="col-md-9">
                        {{--<textarea  class="form-control wysiwyg" placeholder="{{ trans('admin/post.content') }}" name="content" id="inputContent">--}}
                        <textarea  class="form-control" placeholder="보내실 문자의 내용을 입력해주세요." name="content" id="content" style="height: 250px;"></textarea>

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        {{--<a href="{{ route('sms.index') }}" class="btn btn-default"><i class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>--}}
                        <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}" id="send_email" type="button">보내기</button>
                    </div>
                </div>

            </fieldset>
            </form>
        </div>
    </div>

</div><!-- container -->
@endsection


@push( 'header-script' )
<link rel="stylesheet" href="{{ Helper::assets( 'vendor/summernote/summernote.css' ) }}" />
<link rel="stylesheet" href="{{ Helper::assets( 'vendor/select2/css/select2.min.css' ) }}" />
@endpush

@push( 'footer-script' )
{{--<script src="{{ Helper::assets( 'vendor/summernote/summernote.min.js' ) }}"></script>--}}
<script src="{{ Helper::assets( 'vendor/select2/js/select2.full.min.js' ) }}"></script>
<script src="{{ Helper::assets( 'vendor/select2/js/i18n/ko.js' ) }}"></script>


<script type="text/javascript">
$(document).ready(function () {
    $('#send_email').click(function(){
        var mobiles = $('#mobiles').val();
        var content = $('#content').val();

        if(mobiles.length != 0 || content.length != 0){
            $.ajax({
                url : '/send-sms',
                type : 'post',
                data : {
                    'mobiles' : mobiles,
                    'content' : content
                },
                success : function (data){
//                    alert(data);
                    alert('문자가 정상적으로 발송되었습니다.');
                },
                error : function () {
                    alert('전송도중 문제가 발생하였습니다.');
                }
            })
        }else{
            alert('입력한 정보가 충분하지 않습니다.');
        }


    });
});
</script>
@endpush
