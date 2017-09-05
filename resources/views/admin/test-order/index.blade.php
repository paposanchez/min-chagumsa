@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.test')])
@endsection

@section( 'content' )
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal">
                    <fieldset>
                        <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">주문 생성자</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="seq 번호" name="user_id" id="user_id"
                                       value="">
                                <span class="help-block">ex) 유저 2 (user@2by.kr) => 주문하는 유저 seq 번호 </span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">정비소 번호</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="seq 번호" name="garage_id"
                                       id="garage_id" value="">
                                <span class="help-block">ex) 정비소 4 (moon@2by.kr) => 주문하고자 하는 정비소 번호 </span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
                            <label for="" class="control-label col-md-3">차량번호</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="차량번호 ex) 00허0000" name="car_number"
                                       id="car_number" value="">
                                <span class="help-block">ex) 00허000</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                {{--<a href="{{ route('sms.index') }}" class="btn btn-default"><i class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>--}}
                                <button class="btn btn-primary" data-loading-text="{{ trans('common.button.loading') }}"
                                        id="create_order" type="button">주문 생성하기
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- container -->
@endsection



@push( 'footer-script' )
<script type="text/javascript">
    $(function () {
        $(document).on('click', '#create_order', function () {
            var user_id = $('#user_id').val();
            var garage_id = $('#garage_id').val();
            var car_number = $('#car_number').val();

            $.ajax({
                type : 'get',
                dataType : 'json',
                url : '/test/create-order',
                data : {
                    "user_id" : user_id,
                    "garage_id" : garage_id,
                    "car_number" : car_number
                },
                success : function (data){
                    alert('태스트 주문이 생성되었습니다.');
                },
                error : function (data) {
                    alert(data);
                }
            })
        });
    });
</script>
@endpush
