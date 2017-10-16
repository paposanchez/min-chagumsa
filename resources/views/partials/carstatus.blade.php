@if($entry['selected'] == 1328)
    @if(key_exists('loc', $entry))
    <span class='status_char char_ok {{ $entry['loc'] }}' data-toggle="tooltip" title="{{ $entry['name'] }}"></span>
    @endif
@endif
@if($entry['selected'] == 1172)
    @if(key_exists('loc', $entry))
<span class='status_char char_x {{ $entry['loc'] }}' data-toggle="tooltip" title="{{ $entry['name'] }}"></span>
    @endif
@endif
@if($entry['selected'] == 1173)
    @if(key_exists('loc', $entry))
<span class='status_char char_w {{ $entry['loc'] }}' data-toggle="tooltip" title="{{ $entry['name'] }}"></span>
    @endif
@endif
@if($entry['selected'] == 1174)
    @if(key_exists('loc', $entry))
<span class='status_char char_r {{ $entry['loc'] }}' data-toggle="tooltip" title="{{ $entry['name'] }}"></span>
    @endif
@endif
@if($entry['selected'] == 1175)
    @if(key_exists('loc', $entry))
<span class='status_char char_s {{ $entry['loc'] }}' data-toggle="tooltip" title="{{ $entry['name'] }}"></span>
    @endif
@endif
@if($entry['selected'] == 1176)
    @if(key_exists('loc', $entry))
<span class='status_char char_ok {{ $entry['loc'] }}' data-toggle="tooltip" title="{{ $entry['name'] }}"></span>
    @endif
@endif
