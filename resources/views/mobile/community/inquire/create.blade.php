@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>1:1 문의</div>

    <div id='sub_wrap'>

        <div class='br20'></div>

        <div class='join_wrap'>

            <div class='join_term_wrap'>
                <label>이메일</label>
            </div>
            <div class='ipt_line br10'>
                <input type='text' class='ipt' placeholder='아이디 (이메일)'>
            </div>
            <div class='ipt_guide'>※ 답변내용은 이메일로 받아보실 수 있습니다.</div>
            <div class='br20'></div>

            <div class='join_term_wrap'>
                <label>제목</label>
            </div>
            <div class='ipt_line br10'>
                <input type='text' class='ipt' placeholder='제목'>
            </div>
            <div class='br20'></div>

            <div class='join_term_wrap'>
                <label>내용</label>
            </div>
            <div class='ipt_line br10'>
                <textarea class='tarea' placeholder='내용을 입력하세요'></textarea>
            </div>
            <div class='ipt_line br10'>
                <div class='psk_fileUp'>
                    <input type='hidden' class='file_name ipt wid75' placeholder='파일선택을 선택하세요' readonly>
                    <label for='inquery_file'>파일첨부</label>
                    <input type='file' id='inquery_file' class='psk_uploader'>
                </div>
            </div>
            <div class='br20'></div>

            <div class='ipt_line'>
                <button class='btns btns_green' style='display:inline-block;'>문의하기</button>
            </div>

        </div>


    </div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function(){
        var fileTarget = $('.psk_fileUp .psk_uploader');
        fileTarget.on('change', function(){
            if(window.FileReader){
                var filename = $(this)[0].files[0].name;
            } else {
                var filename = $(this).val().split('/').pop().split('\\').pop(); // 파일명만 추출
            }
            $(this).siblings('.file_name').val(filename); });
    });
</script>

@endpush