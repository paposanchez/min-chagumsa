@if(isset($entry['use_image']) && $entry['use_image'] == 1)
<div class="diagnosis-uploader-container lightbox">
        @each("partials.diagnosis-image", $entry['files'], 'file')
</div>

@if(isset($entry['id']))
{{ print_r($entry['id']) }}
@else
------------
@endif

<form class="diagnosis-uploader-form pull-right dropzone" action="/diagnosis/upload-file" method="post" enctype="multipart/form-data" style="width:38px;height:38px;display:inline-block;">
        <input type="hidden" name='diagnosis_id' value="">
        <input type="file" name="upfile" style="display:none" class='diagnosis-uploader-input' onChange="$(this).closest('form').submit()"/>
        <div data-id="" class='btn btn-circle btn-icon btn-info diagnosis-uploader'><i class="fa fa-upload"draggable='true'></i></div>
</form>
@endif


@if(isset($entry['options']))
<div class="btn-group" data-toggle="buttons">
        @foreach($entry['options'] as $code)
        <label class="btn btn-default {{ $entry['selected'] == $code['id'] ? 'active' : '' }} selected_cd" data-id="{{ $code['id'] }}">
                {{ $code['display'] }}
                {{ Form::radio('selected[]', $code['id'], ($code['id'] == $entry['selected']), ['name' => 'cd']) }}
        </label>
        @endforeach
</div>
@endif


@if(isset($entry['use_voice']) && $entry['use_voice'] == 1)
@foreach($entry['files'] as $file)
<audio src="https://cdn.chagumsa.com/diagnosis/" controls></audio>
@endforeach
@endif
