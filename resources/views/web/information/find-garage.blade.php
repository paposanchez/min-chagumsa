@extends( 'web.layouts.pop-up' )

@section( 'content' )

<div class='sub_shop_wrap'>

    <div class='order_info_box'>
        <div class='br30'></div>
        <div class='ipt_line'>
            <div class='psk_select wid33'>
                {{--<button class='btns btns2'><span>지역 선택</span> <i class="fa fa-chevron-down"></i></button>--}}
                {{--<ul>--}}
                    {{--<li><a>서울특별시</a></li>--}}
                    {{--<li><a>인천광역시</a></li>--}}
                {{--</ul>--}}
                <select class="form-control btns btns2" id="areas" autocomplete="off">
                    <option value="0" selected>시/도를 선택하세요.</option>

                    @foreach($garages as $key => $garage)
                        <option value="{{ $garage->id }}">{{ $garage->area }}</option>
                    @endforeach
                </select>
            </div>&nbsp;&nbsp;
            <div class='psk_select wid33'>
                <select class="form-control btns btns2" id="sections">
                    <option value="" selected>구/군을 선택하세요.</option>
                </select>
            </div>
            &nbsp;&nbsp;<button class='btns btns_skyblue wid20' type="button" style='position:relative;' id="search">검색</button>
        </div>
    </div>

    <div class='br10'></div>

    <div class='order_address_wrap' id="garage_list">
        <ul>
            @foreach($all_garages as $garage)
            <li>
                <strong>{{ $garage->name }}</strong>
                <p>전화번호 : {{ $garage->tel }}<br>주소 : {{ $garage->address }}</p>
            </li>
            @endforeach
        </ul>
    </div>

</div>


@endsection




@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
    $(function(){
        $('#areas').change(function () {
            var garage_area = $('#areas option:selected').text();
            $.ajax({
                type : 'get',
                dataType : 'json',
                url : '/order/get_section/',
                data : {
                    '_token': '{{ csrf_token() }}',
                    'garage_area' : garage_area
                },
                success : function (data) {
                    $('#sel_section').text('구/군을 선택하세요.');
                    $.each(data, function (key, value) {
                        $('#sections').append($('<option/>', {
                            value: value.id,
                            text : value.section
                        }));
                    });
                },
                error : function () {
                    alert('error');
                }
            })
        });



        // 정비소 관련 리스트
        $('#search').click(function (){
            var sel_area = $('#areas option:selected').text();
            var sel_section = $('#sections option:selected').text();
            var html = '';

            if(sel_area != '시/도를 선택하세요.' && sel_section != '구/군을 선택하세요.'){
                $.ajax({
                    type : 'get',
                    dataType : 'json',
                    url : '/order/get_address/',
                    data : {
                        'sel_area' : sel_area,
                        'sel_section' : sel_section,
                        '_token': '{{ csrf_token() }}'
                    },
                    success : function (data){
                        html += "<ul>";
                        $.each(data, function (key, value) {
                            html += "<li>";
                            html += "<strong>"+value.name+"</strong>";
                            html += "<p>전화번호 : "+value.tel;
                            html += "<br>주소 : " + value.address	+"</p>";
                            html += "</li>";
                        });
                        html += "</ul>";
                        $('#garage_list').html(html);
                    },
                    error : function (data) {
                        alert('error');
                    }
                })
            }
            else if (sel_area != '시/도를 선택하세요.' && sel_section == '구/군을 선택하세요.'){
                $.ajax({
                    type : 'get',
                    dataType : 'json',
                    url : '/order/get_address/',
                    data : {
                        'sel_area' : sel_area,
                        '_token': '{{ csrf_token() }}'
                    },
                    success : function (data){
                        html += "<ul>";
                        $.each(data, function (key, value) {
                            html += "<li>";
                            html += "<strong>"+value.name+"</strong>";
                            html += "<p>전화번호 : "+value.tel;
                            html += "<br>주소 : " + value.address	+"</p>";
                            html += "</li>";
                        });
                        html += "</ul>";
                        $('#garage_list').html(html);
                    },
                    error : function (data) {
                        alert('error');
                    }
                })
            }
            else{
                alert("입고대리점을 검색해 주세요.");
                $("garage_list").attr("tabindex", -1).focus();
            }
        });
    });
</script>
@endpush
