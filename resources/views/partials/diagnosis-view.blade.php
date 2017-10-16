@if($entry['name'])
        <strong style="display:inline-block; width:100px;">{{ $entry['name']['display'] }}</strong>
@endif

@if($entry['use_image'] == 1)
    @if($entry['group'] != 2001)
        @foreach($entry['files'] as $file)
            <a href="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=400&qty=80&url={{ $file['preview'] }}"
               class="diagnosis-thumbnail pull-right"
               data-toggle="lightbox"
               data-title="{{ $file['original'] }}"
               data-footer="{{ $file['created_at'] }} | {{ Helper::formatBytes($file['size']) }} | <a href='{{ $file['preview'] }}' target='_blank'>원본보기</a>"
               data-type="image"
               data-gallery="diagnosis-gallery"
            >
                <img
                        src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=400&qty=80&url={{ $file['preview'] }}"
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
        {!! nl2br($entry['comment']) !!}
@endif
