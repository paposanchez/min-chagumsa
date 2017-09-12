@extends( 'mobile.layouts.report' )

@section( 'content' )

    <ul class='report_menu_wrap'>
        <li class='select' id="select-1"><a href='#' data-id="m1" class="sample_img">자동차 인증서</a></li>
        <li class='' id="select-2"><a href='#' data-id="m2" class="sample_img">가격산정서</a></li>
    </ul>

    <div class=''>
        <img src="" id="sample" style="width:100%; height: auto; max-width: 100%;">
    </div>


    <a href="#" class="scrollToTop">TOP</a>


@endsection


@push( 'header-script' )

<style>
    .scrollToTop{
        width:50px;
        height:auto;
        padding:10px;
        text-align:center;
        background: #09395f;
        font-weight: bold;
        color: #9cc414;
        font-size: 15px;
        text-decoration: none;
        position:fixed;
        top:75px;
        right:10px;
        display:none;
        opacity: 0.5;
    }
    .scrollToTop:hover{
        text-decoration:none;
    }

</style>
@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function () {

        var sample_list = {
            "m1": "/assets/img/m1.png",
            "m2": "/assets/img/m2.png",
        };

        if($("#sample").attr("src") == ''){
            $("#sample").attr("src", sample_list.m1);
        }


        $(".sample_img").on("click", function(){
            var id = $(this).data('id');
//            $("#sample").attr("src", sample_list[id]);

            switch (id){
                case "m1":
                    $("#select-1").addClass("select");
                    $("#select-2").removeClass("select");
                    break;
                case "m2":
                    $("#select-2").addClass("select");
                    $("#select-1").removeClass("select");
                    break;
                default:
                    $("#select-1").addClass("select");
                    $("#select-2").removeClass("select");
            }
            $("#sample").fadeOut(200)
                .delay(200)
                .queue(function(next) { $(this).attr("src", sample_list[id]); next(); })
                .delay(200)
                //                .fadeIn(200);
                .slideToggle(200);
        });

        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });

        //Click event to scroll to top
        $('.scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });

    });
</script>

@endpush