@if($entry['use_image'] == 1)
        @foreach($entry['files'] as $file)
        <img
        src="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=300&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $file['id'] }}&format=png&h_pos=10&bg_rgb=ffffff"
        data-url="http://mme.chagumsa.com/resize?logo=1&r=ffffff&width=860&qty=87&w_opt=0.4&w_pos=10&url=http://www.chagumsa.com/file/diagnosis-download/{{ $file['id'] }}&format=png&h_pos=10&bg_rgb=ffffff"
        alt=''
        class="thumbnail no-margin diagnosis-play"
        style="width:50px;height:50px;display:inline-block;">
        @endforeach
@endif


@if($entry['options'])
<select class="form-control" style="margin-top:10px;">
        @foreach($entry['options'] as $option)
        <option value="{{ $option['id'] }}">{{ $option['display'] }}</option>
        @endforeach
</select>
@endif


@if($entry['use_voice'] == 1)
<ul class="list-inline">
        @foreach($entry['files'] as $file)
        <li><a href="#" data-id="{{ $file['id'] }}" class="btn btn-icon btn-circle btn-primary diagnosis-play" title=" {{ $file['original'] }}"><i class="fa fa-play"></i></a></li>
        @endforeach
</ul>

<textarea name="comment" rows="3" class="form-control"  style="margin-top:10px;">{{ $entry['comment'] }}</textarea>
@endif
