@extends( 'admin.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.diagnosis')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <h3>
                <span class="text-lg text-light" id="dia-top">
                        {{ $order->getOrderNumber() }}
                </span>
        </h3>

        <div class="bg-white">

            <div class="row">
                <div class="col-md-3">

                    <div class="block" style="padding-top:10px;">
                        <h4>진단레이아웃</h4>
                        <nav class="nav nav-sidebar" id="sidebar-menu">
                            <ul class="list-unstyled main-menu">
                                @foreach($diagnosis['entrys'] as $entrys)
                                    <li class="">
                                        <a href="#dia-{{ $entrys['name_cd'] }}">{{ $entrys['name']['display'] }}</a>
                                        <ul class="list-unstyled sub-menu">
                                            @foreach($entrys['entrys'] as $entry)
                                                <li class=""><a
                                                            href="#dia-{{ $entry['name_cd'] }}">{{ $entry['name']['display'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                </div>

                <div class="col-md-9">

                    <form class="form-horizontal">

                        <fieldset>
                            <table class="table-diagnosis">

                                <colgroup>
                                    <col width="25%">
                                    <col width="*">
                                </colgroup>

                                @foreach($diagnosis['entrys'] as $entrys)
                                    <thead>
                                    <tr class="active">
                                        <th colspan="2" class="text-middle">
                                            <h4 class="clearfix" id="dia-{{ $entrys['name_cd'] }}"
                                                style="line-height:30px;">
                                                {{ $entrys['name']['display'] }}
                                                <a href="#dia-top" class="pull-right" data-toggle="tooltip"
                                                   title="위로"><i class="fa fa-arrow-up"></i></a>
                                            </h4>
                                        </th>
                                    </tr>
                                    </thead>


                                    @foreach($entrys['entrys'] as $entry)
                                        <tbody>
                                        <tr id="dia-{{ $entry['name_cd'] }}">
                                            <th>{{ $entry['name']['display'] }}</th>
                                            <td

                                                    @if(count($entry['children']))
                                                    class="no-padding"
                                                    @endif
                                            >

                                                @each("partials.diagnosis", $entry['entrys'], 'entry')

                                                @if(isset($entry['children']))
                                                    <table class="">
                                                        <col width="25%">
                                                        <col width="*">
                                                        <tbody class="no-border">
                                                        @foreach($entry['children'] as $children)
                                                            <tr>
                                                                <th class="">{{ $children['name']['display'] }}</th>
                                                                <td>
                                                                    <ul class="list-unstyled no-margin">
                                                                        @foreach($children['entrys'] as $child)
                                                                            <li class="">
                                                                                @include('partials.diagnosis',['entry' =>  $child])
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                @endif

                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach

                                @endforeach


                            </table>

                        </fieldset>

                    </form>

                </div>

            </div>


        </div>


    </div>
@endsection

@push( 'header-script' )
{{ Html::script(Helper::assets( 'vendor/audio/audio.min.js' )) }}

@endpush


@push( 'footer-script' )

<script>
    var diagnosis_audio;
    $('.diagnosis-soundplay').on('click', function (e) {

        e.preventDefault();
        var $obj = $(this).find('.fa');

        if ($obj.hasClass("fa-play")) {
            // remove all started instance
            $('.diagnosis-soundplay .fa-pause').each(function () {
                $(this).removeClass('fa-pause').addClass('fa-play');
                if (diagnosis_audio instanceof Audio) {
                    diagnosis_audio.pause();
                }
                diagnosis_audio = null;
            });

            // var s = "/assets/crowd-cheering.mp3";
            var s = $obj.data('source');
            diagnosis_audio = new Audio(s);
            diagnosis_audio.play();
            $obj.removeClass('fa-play').addClass('fa-pause');
        } else {
            diagnosis_audio.pause();
            $obj.removeClass('fa-pause').addClass('fa-play');
        }


        // .toggleClass('fa-play fa-pause');
        // if ( $obj.is( ".fa-play" ) ) {
        //         $obj.removeClass('fa-play').addClass('fa-pause');
        // } else {
        //         $obj.removeClass('fa-pause').addClass('fa-play');
        // }

    });

    $(".selected_cd").change(function(){
        var change_value = $(this).val();
        var diagnosis_id = $(this).data('id');
        $.ajax({
            type : 'post',
            dataType : 'json',
            url : '/diagnosis/update-code',
            data : {
                'id' : diagnosis_id,
                'selected' : change_value
            },
            success : function (data){
//                    alert(JSON.stringify(data));
                alert('코드가 정상적으로 변경되었습니다.');
            },
            error : function (data){
//                    alert(JSON.stringify(data));
                alert('변경중 오류가 발생하였습니다.');
            }
        })
    })
</script>

@endpush
