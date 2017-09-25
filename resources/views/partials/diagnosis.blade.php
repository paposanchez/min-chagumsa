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
    {!! Form::select('selected[]', \App\Helpers\Helper::getCodeArray($entry['options_cd']), \App\Helpers\Helper::getCodePluck($entry['selected']), [ 'class' => 'selected_cd', 'data-id' => $entry['id']]) !!}
@endif


@if($entry['use_voice'] == 1)
    @foreach($entry['files'] as $file)
        <button type="button" class="btn btn-circle btn-primary diagnosis-soundplay" data-toggle="tooltip" data-source="{{ $file['fullpath'] }}" data-mime="{{ $file['mime'] }}"  title="{{ $file['original'] }}"><i class="fa fa-play"></i></button>
    @endforeach

    <textarea name="comment" class="form-control" data-id="{{ $entry['id'] }}" style="height:60px; margin-top:10px;" id="{{ $entry['id'] }}" placeholder="음성파일 내용을 입력해주세요.">{{ $entry['comment'] }}</textarea>
    <button type="button" class="form-control btn-primary save" data-id="{{ $entry['id'] }}">저장</button>

@endif
