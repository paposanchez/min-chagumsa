@if($entry['name'])
    <strong style="display:inline-block; width:100px;">{{ $entry['name']['display'] }}</strong>
@endif

@if($entry['use_image'] == 1)
    <div class="diagnosis-uploader-container">
        @each("partials.diagnosis-image", $entry['files'], 'file')
    </div>

    @if($entry['use_image'] == 1)
        <form class="diagnosis-uploader-form pull-right dropzone" action="/diagnosis/upload-file" method="post"
              enctype="multipart/form-data" style="width:38px;height:38px;display:inline-block;margin-right:5px;">
            <input type="hidden" name='diagnosis_id' value='{{ $entry['id'] }}'>
            <input type="file" name="upfile" style="display:none" class='diagnosis-uploader-input'
                   onChange="$(this).closest('form').submit()"/>
            <div data-id="{{ $entry['id'] }}" class='btn btn-circle btn-icon btn-info diagnosis-uploader'><i
                        class="fa fa-upload"draggable='true'></i></div>
        </form>
    @endif

@endif


@if($entry['options'])
    {{--    {!! Form::select('selected[]', array('default' => '선택해주세요.') +\App\Helpers\Helper::getCodeArray($entry['options_cd']), \App\Helpers\Helper::getCodePluck($entry['selected']), [ 'class' => 'selected_cd', 'data-id' => $entry['id']]) !!}--}}
    <div class="btn-group" data-toggle="buttons">
        @foreach(\App\Helpers\Helper::getCodeArray($entry['options_cd']) as $key=>$val )
            <label class="btn btn-default {{ $entry['selected'] == $key ? 'active' : '' }} selected_cd" data-id="{{ $entry['id'] }}">
                {{ Form::radio('selected[]', $key, \App\Helpers\Helper::isCheckd($key, $entry['selected']), ['name' => 'cd']) }} {{ $val }}
            </label>
        @endforeach
    </div>
@endif


@if($entry['use_voice'] == 1)
    @foreach($entry['files'] as $file)
        <button type="button" class="btn btn-circle btn-primary diagnosis-soundplay" data-toggle="tooltip"
                data-source="{{ $file['fullpath'] }}" data-mime="{{ $file['mime'] }}" title="{{ $file['original'] }}"><i
                    class="fa fa-play"></i></button>
    @endforeach

    <textarea name="comment" class="form-control" data-id="{{ $entry['id'] }}" style="height:60px; margin-top:10px;"
              id="{{ $entry['id'] }}" placeholder="음성파일 내용을 입력해주세요.">{{ $entry['comment'] }}</textarea>
    <button type="button" class="form-control btn-primary save" data-id="{{ $entry['id'] }}">저장</button>

@endif
