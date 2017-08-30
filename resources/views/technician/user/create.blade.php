@extends( 'technician.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('technician.order')])
@endsection

@section( 'content' )

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                {!! Form::open(['method' => 'POST','url' => ['user/store'], 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data"]) !!}
                    <input type="hidden" name="roles" value="">{{-- todo 엔지니어 상태값 고정--}}

                    <div class="form-group ">
                        <label for="inputEmail" class="control-label col-md-3">이메일</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="이메일" name="email" id="inputEmail" value="" type="email">

                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="inputName" class="control-label col-md-3">이름</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="이름" name="name" id="inputName" value="" type="name">

                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="inputPassword" class="control-label col-md-3">비밀번호</label>
                        <div class="col-md-4">
                            <input class="form-control" placeholder="비밀번호" name="password" id="inputPassword" type="password">

                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="inputPasswordConfirmation" class="control-label col-md-3">비밀번호 확인</label>
                        <div class="col-md-4">
                            <input class="form-control" placeholder="비밀번호 확인" name="password_confirmation" id="inputPasswordConfirmation" type="password">

                        </div>
                    </div>

                    <div class="form-group  garage" style="display: none;">
                        <label for="inputGarage" class="control-label col-md-3">정비소</label>
                        <div class="col-md-6 selected_garage">
                            <input class="form-control" name="garage" id="selected_garage" value="" readonly="" type="text">
                        </div>
                    </div>

                    <div id="garage_info" style="display: none">
                        <div class="form-group  aliance">
                            <label for="inputGarage" class="control-label col-md-3">BCS 네트워크</label>
                            <div class="col-md-6 ">

                                <select class="form-control" multiple="" id="aliance" name="aliance_id"><option value="3">Holy Bravo</option></select>
                            </div>
                        </div>
                        <div class="form-group  garage_name">
                            <label for="inputGarage" class="control-label col-md-3">정비소 명</label>
                            <div class="col-md-6 ">
                                <input class="form-control" placeholder="정비소 명" name="garage_name" id="garage_name" value="" type="text">
                            </div>
                        </div>
                        <div class="form-group  garage_tel">
                            <label for="inputGarage" class="control-label col-md-3">정비소 전화번호</label>
                            <div class="col-md-6 ">
                                <input class="form-control" placeholder="정비소 전화번호" name="garage_tel" id="garage_tel" value="" type="text">
                            </div>
                        </div>
                        <div class="form-group  garage_zipcode">
                            <label for="inputGarage" class="control-label col-md-3">우편번호</label>
                            <div class="col-md-6 ">
                                <input class="form-control" placeholder="우편번" name="garage_zipcode" id="garage_zipcode" value="" type="text">
                            </div>
                        </div>
                        <div class="form-group  garage_area">
                            <label for="inputGarage" class="control-label col-md-3">시/도</label>
                            <div class="col-md-6 ">
                                <input class="form-control" placeholder="시/도 입력" name="garage_area" id="garage_area" value="" type="text">
                            </div>
                        </div>
                        <div class="form-group  garage_section">
                            <label for="inputGarage" class="control-label col-md-3">구/군</label>
                            <div class="col-md-6 ">
                                <input class="form-control" placeholder="구/군 입력" name="garage_section" id="garage_section" value="" type="text">
                            </div>
                        </div>
                        <div class="form-group  garage_address">
                            <label for="inputGarage" class="control-label col-md-3">나머지 주소</label>
                            <div class="col-md-6 ">
                                <input class="form-control" placeholder="나머지 상세 주소" name="garage_address" id="garage_address" value="" type="text">
                            </div>
                        </div>
                    </div>



                    <div class="form-group ">
                        <label for="inputUserStatus" class="control-label col-md-3">상태</label>
                        <div class="col-md-3">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default">
                                    <input name="status_cd" autocomplete="off" value="1" type="radio"> 활성
                                </label>
                                <label class="btn btn-default">
                                    <input name="status_cd" autocomplete="off" value="2" type="radio"> 비활성
                                </label>
                            </div>

                        </div>
                    </div>


                    <div class="form-group ">
                        <label for="inputMobile" class="control-label col-md-3">휴대전화번호</label>
                        <div class="col-md-4">
                            <input class="form-control" placeholder="휴대전화번호" name="mobile" id="inputMobile" value="" type="text">

                        </div>
                    </div>


                    <div class="form-group ">
                        <label for="inputAvatar" class="control-label col-md-3">아바타</label>
                        <div class="col-md-6">
                            <div class="fileinput fileinput-new" data-provides="fileinput">

                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                    {{ Html::image('/avatar', 'zlara', array('class' => 'aside-profile-img', 'title'=>'profile')) }}
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                <div>
                            <span class="btn btn-default btn-file">
                                <span class="fileinput-new">파일선택</span>
                                <span class="fileinput-exists">변경</span>
                                <input placeholder="아바타" name="avatar" id="inputAvatar" type="file">
                            </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">삭제</a>
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <a href="http://admin.car.app/user" class="btn btn-default"><i class="fa fa-reply"></i> 돌아가기</a>
                            <button class="btn btn-primary" data-loading-text="처리중..." type="submit">저장</button>
                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>

    </div>

@endsection

@section( 'footer-script' )
    <script type="text/javascript">

    </script>
@endsection