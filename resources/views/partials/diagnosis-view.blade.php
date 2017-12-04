@if($entry['name'])
        <strong style="display:inline-block; width:100px;">{{ $entry['name']['display'] }}</strong>
@endif
@if($entry['use_image'] == 1)
    @if($entry['group'] != 2001)
        @foreach($entry['files'] as $file)
            <a href="http://image.chagumsa.com/diagnosis/{{ $file['id'] }}-400.png"
               class="diagnosis-thumbnail pull-right"
               data-toggle="lightbox"
               data-title="{{ $file['original'] }}"
               @if(strpos(url('/'), "http://cert.") !== false)
                data-footer=""
               @else
                       data-footer="{{ $file['created_at'] }} | {{ Helper::formatBytes($file['size']) }} | <a class='get-origin-image' href='#' data-origin_url='http://image.chagumsa.com/diagnosis/{{ $file['id'] }}.png'>원본보기</a>"
               @endif
               data-type="image"
               data-gallery="diagnosis-gallery"
            >
                <img
                        src="http://image.chagumsa.com/diagnosis/{{ $file['id'] }}-264.png"
                        class="img-responsive"
                        style="width:30px;height:30px;display:inline-block;">
            </a>
        @endforeach
    @endif
@endif


@if($entry['options'])
{!! \App\Helpers\Helper::getCodeName($entry['selected']) !!}
@endif


@if($entry['use_voice'] == 1)
        {!! $entry['comment'] ? nl2br($entry['comment']) : '점검의견 없음' !!}
@endif