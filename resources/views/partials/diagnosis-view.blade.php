@if($entry['name'])
        <strong style="display:inline-block; width:100px;">{{ $entry['name']['display'] }}</strong>
@endif

@if($entry['use_image'] == 1)

    @foreach($entry['files'] as $file)
        <a href="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url={{ $file['preview'] }}"
           class="diagnosis-thumbnail pull-right"
           data-toggle="lightbox"
           data-title="{{ $file['original'] }}"
           data-footer="{{ $file['created_at'] }} | {{ Helper::formatBytes($file['size']) }} | <a href=''> 삭제</a>"
           data-type="image"
           data-gallery="diagnosis-gallery"
        >
            <img
                    src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url={{ $file['id'] }}"
                    data-url="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=860&qty=87&w_opt=0.4&w_pos=10&url={{ $file['preview'] }}"
                    class="img-responsive" style="width:30px;height:30px;display:inline-block;">
        </a>
    @endforeach
@endif


@if($entry['options'])
{!! \App\Helpers\Helper::getCodeName($entry['selected']) !!}
@endif


@if($entry['use_voice'] == 1)
        {!! nl2br($entry['comment']) !!}
@endif
