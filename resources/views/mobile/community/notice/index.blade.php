@extends( 'mobile.layouts.default' )

@section( 'content' )

    <div id='sub_title_wrap'>공지사항</div>

    <ul class='board_list_wrap'>
        @foreach($entrys as $key => $row)
            <li>
                <a href='{{ url("community/notice", ['id' => $row->id]) }}' class='board'>
                    <div class='notice'>{{ mb_strimwidth($row->subject, 0, 50, '...') }}</div>
                    <span>{{ $row->updated_at ? $row->updated_at->format("Y년m월d일") : $row->created_at->format("Y년m월d일") }}</span>
                </a>
            </li>

        @endforeach
    </ul>

    <div class='br20'></div>

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
    $(function(){


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
                    success: function(rows, textStatus, jqXHR){
                        var li_tag = "";
                        $.each(rows, function (key, row) {
                            li_tag =  '<li>'
                            + '<a href="/community/notice/' + row.id + '" class="board">'
                            + "<div class='notice'>" + row.subject + "</div>"
                            + "<span>" + row.date + "</span>"
                            + '</a>'
                            + '</li>';
                        });
                        $(".board_list_wrap").append(li_tag);
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

    });
</script>

@endpush