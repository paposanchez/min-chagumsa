@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>FAQ</div>

    <div class='faq_cate_wrap'>
        <select id="category">
            <option value="">전체</option>
            <option value="13"{{ (app('request')->input('category_id') == 13)? ' selected="true"': '' }}>가입/탈퇴</option>
            <option value="14"{{ (app('request')->input('category_id') == 14)? ' selected="true"': '' }}>로그인</option>
            <option value="15"{{ (app('request')->input('category_id') == 15)? ' selected="true"': '' }}>아이디/비밀번호찾기</option>
            <option value="16"{{ (app('request')->input('category_id') == 16)? ' selected="true"': '' }}>회원정보관리</option>
            <option value="17"{{ (app('request')->input('category_id') == 17)? ' selected="true"': '' }}>결제관련</option>
            <option value="18"{{ (app('request')->input('category_id') == 18)? ' selected="true"': '' }}>주문상태</option>
            <option value="19"{{ (app('request')->input('category_id') == 19)? ' selected="true"': '' }}>환불규정</option>
            <option value="20"{{ (app('request')->input('category_id') == 20)? ' selected="true"': '' }}>가이드</option>
        </select>
    </div>

    @foreach($entrys as $key => $row)
        <dl class='faq_view_wrap'>
            <dt class="question" data-id="{{ $row->id }}" style="cursor: pointer;">{{ $row->subject }}</dt>
            <dd id="ans-{{ $row->id }}">{!! $row->content !!}</dd>
        </dl>
    @endforeach

    <div id='sub_wrap'>

        <div class='ipt_line'>
            <button id="next" type="button" class='btns btns_navy' style='display:inline-block;' data-current_page="{{ $entrys->currentPage() }}" data-last_page="{{ $entrys->lastPage() }}">
                @if($entrys->currentPage() < $entrys->lastPage())
                    더보기 <i class="fa fa-angle-down"></i>
                @else
                    데이터가 없습니다.
                @endif
            </button>
        </div>

    </div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function () {
        //faq toggle
        $("dt").on("click", function(){
            $(this).nextUntil("dt").toggle();
        });
        $("dd").hide();

        //next
        $("#next").on("click", function () {

            var current_page = parseInt($(this).data('current_page'));
            var last_page = parseInt($(this).data('last_page'));
            var next_page = current_page + 1;

            if(current_page < last_page){
                $.ajax({
                    url: "/community/notice/next",
                    type: "post",
                    dataType: "json",
                    xhrFields: {
                        withCredentials: true
                    },
                    crossDomain: true,
                    data: {'page': next_page},
                    success: function(jdata, textStatus, jqXHR){

                        row = jdata.data;
                        var faq_tag = "";

                        $.each(rows, function (key, row) {
                            faq_tag += "<dl class='faq_view_wrap'>"
                                + '<dt class="question">' + row.subject + '</dt>'
                                + '<dd id="ans-' + row.id + '">' + row.content + '</dd>'
                                + '</dl>';
                        });
                        $(".board_list_wrap").append(faq_tag);
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        /*
                         console.log("HTTP Request Failed");
                         console.log(jqXHR);
                         console.log(textStatus);
                         console.log(errorThrown);
                         */
                    },
                    complete: function(e){

                        if(last_page == next_page){
                            $("#next").attr("disabled", true);
                            $("#next").text("데이터가 없습니다.");
                        }
                        $(this).data('current_page', next_page);
                    }
                });
            }else{

                $("#next").attr("disabled", true);
                $("#next").text("데이터가 없습니다.");
            }
        });

        //category sort
        $("#category").on("change", function () {
            var category_id = $(this).val();
            location.href = "/community/faq?category_id=" + category_id;
        });
    });
</script>
@endpush