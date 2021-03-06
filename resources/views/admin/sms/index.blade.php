@extends( 'admin.layouts.default' )

@section( 'content' )
    <section id="content">
        <div class="container">
            <div class="card">
                <div class="card-header ch-alt">
                    <h2>SMS 보내기</h2>
                </div>
                <div class="card-body card-padding">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group {{ $errors->has('mobiles') ? 'has-error' : '' }}">
                                <label for="inputSubject" class="control-label col-md-3">휴대폰 번호</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="ex) 010-0000-0000,010-0000-0001" name="mobiles" id="mobiles" value="">
                                    <span class="help-block">* 여러명 보낼 시 ex) 010-0000-0000,010-0000-0001</span>
                                    <button class="btn btn-default" type="button" id="total-bcs">BCS 전체</button>
                                    <button class="btn btn-default" type="button" id="delete">모두 지우기</button>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('subejct') ? 'has-error' : '' }}">
                                <label for="inputSubject" class="control-label col-md-3">제목</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="ex) 010-0000-0000,010-0000-0001" name="subject" id="subject" value="">
                                    <span class="text-danger">* 제목은 MMS에서만 첨부됩니다.</span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                                <label for="inputContent" class="control-label col-md-3">내용</label>
                                <div class="col-md-9">
                                    {{--<textarea  class="form-control wysiwyg" placeholder="{{ trans('admin/post.content') }}" name="content" id="inputContent">--}}
                                    <textarea  class="form-control" placeholder="보내실 문자의 내용을 입력해주세요." name="contents" id="contents" style="height: 250px;"></textarea>

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
        </div>
    </section>
@endsection


@push( 'footer-script' )

    <script type="text/javascript">
        $(document).ready(function () {
            $('#send_email').click(function(){
                var mobiles = $('#mobiles').val();
                var content = $('#contents').val();
                var subject = $('#subject').val();

                if(mobiles.length != 0 || content.length != 0){
                    $.ajax({
                        url : '/sms/send-sms',
                        type : 'get',
                        data : {
                            'subject' : subject,
                            'mobiles' : mobiles,
                            'content' : content
                        },
                        success : function (data){
                            alert('문자가 정상적으로 발송되었습니다.');
                        },
                        error : function (data) {
                            alert('전송도중 문제가 발생하였습니다.');
                        }
                    })
                }else{
                    alert('입력한 정보가 충분하지 않습니다.');
                }
            });

            $(document).on('click', '#total-bcs', function (){
                $.ajax({
                    type : 'get',
                    url : '/sms/total-bcs',
                    success : function (data){
                        $('#mobiles').val(data);
                    },
                    error : function (){
                        alert('error');
                    }
                })
            });

            $(document).on('click', '#delete', function(){
                $('#mobiles').val("");
                $('#mobiles').focus();
            });
        });
    </script>
@endpush
