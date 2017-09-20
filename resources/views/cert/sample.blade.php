@extends( 'layouts.report' )

@section( 'content' )

<div id="loading">
        <img src="" id="sample" usemap="#Map">
</div>
<map name="Map" id="Map">
        <area alt="" title="자동차요약보고서" class="sample_img" href="#" data-id="s1" shape="poly" coords="4,80,309,79,309,124,7,124" />
        <area alt="" title="자동차품질보고서" class="sample_img" href="#" data-id="s2" shape="poly" coords="6,134,303,136,304,173,8,170" />
        <area alt="" title="자동차가격산정보고서" class="sample_img" href="#" data-id="s3" shape="poly" coords="6,186,312,187,312,224,6,223" />
        <area alt="" title="자동차이력보고서" class="sample_img" href="#" data-id="s4" shape="poly" coords="7,236,311,236,308,276,6,274" />
</map>

<script type="text/javascript">
$(function () {
        var sample_list = {
                "s1": "/assets/img/s1.png",
                "s2": "/assets/img/s2.png",
                "s3": "/assets/img/s3.png",
                "s4": "/assets/img/s4.png"
        };

        if($("#sample").attr("src") == ''){
                $("#sample").attr("src", sample_list.s1);
        }


        $(".sample_img").on("click", function(){
                var id = $(this).data('id');
                //            $("#sample").attr("src", sample_list[id]);
                $("#sample").fadeOut(200)
                .delay(200)
                .queue(function(next) { $(this).attr("src", sample_list[id]); next(); })
                .delay(200)
                //                .fadeIn(200);
                .slideToggle(200);
        });
})
</script>

@endsection
