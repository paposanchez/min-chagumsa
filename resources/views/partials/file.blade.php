<li class='plugin-attach-file' data-id='{{ $file ? $file->id : "" }}'>
    <input type='hidden' name='upfile[]' class='plugin-attach-file-input'>

    <div class="qq-progress-bar-container-selector">
        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
    </div>

    <span class="qq-upload-spinner-selector qq-upload-spinner" style='{{ $file ? "display: none;" : "" }}}'></span>

    <img src='{{ $file ? '/thumbnail/'. $file->id : "" }}' class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>

    <span class="qq-upload-file-selector qq-upload-file plugin-attach-download">{{ $file ? $file->original : "" }}</span>

    <span class="qq-upload-size-selector qq-upload-size">{{ $file ? Helper::formatBytes($file->size) : "" }}</span>

    <div class="btn-group">

        @if($file)
        <button type="button" class="btn btn-default btn-xs qq-upload-delete-selector qq-upload-delete plugin-attach-delete" title='{{ trans('common.button.destroy') }}'><i class='fa fa-remove'></i></button>
        @else
        <button type="button" class="btn btn-default btn-xs qq-upload-cancel-selector qq-upload-cancel" title='{{ trans('common.button.cancel') }}'><i class='fa fa-ban'></i></button>
        <button type="button" class="btn btn-default btn-xs qq-upload-retry-selector qq-upload-retry" title='{{ trans('common.button.retry') }}'><i class='fa fa-refresh'></i></button>
        <button type="button" class="btn btn-default btn-xs qq-upload-delete-selector qq-upload-delete" title='{{ trans('common.button.destroy') }}'><i class='fa fa-remove'></i></button>
        @endif
    </div>

    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
</li>