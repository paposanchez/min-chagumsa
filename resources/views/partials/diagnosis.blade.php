@if($entry['name'])
    <strong style="display:inline-block; width:100px;">{{ $entry['name']['display'] }}</strong>
@endif

@if($entry['use_image'] == 1)
    @foreach($entry['files'] as $file)
        <a href="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=400&qty=80&url={{ $file['preview'] }}"
           class="diagnosis-thumbnail pull-right"
           data-toggle="lightbox"
           data-title="{{ $file['original'] }}"
           data-footer="{{ $file['created_at'] }} | {{ Helper::formatBytes($file['size']) }} | <a href='{{ $file['preview'] }}' target='_blank'>원본보기</a> | <a href='#' class='text-danger diagnosis-file-delete' data-id='{{ $file['id'] }}'>삭제</a>"
           data-type="image"
           data-gallery="diagnosis-gallery"
        >
            <img
                    src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=400&qty=80&url={{ $file['preview'] }}"
                    class="img-responsive"
                    style="width:35px;height:35px;display:inline-block;">
        </a>
    @endforeach

    @if($entry['use_image'] == 1)
    <button
    data-id="{{ $entry['id'] }}"
    class='btn btn-circle btn-info pull-right diagnosis-uploader' style="margin-right:5px;"><i  class="fa fa-upload"></i></button>
    @endif

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
