<div class="qq-uploader-selector qq-uploader qq-uploader-blank" qq-drop-area-text="{{ trans('file.drop_here') }}">

    <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
        <span class="qq-upload-drop-area-text-selector"></span>
    </div>

    <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
    </div>

    <div class="qq-upload-button-selector btn btn-block btn-primary">
        <div>{{ trans("common.button.file-select") }}</div>
    </div>

    <span class="qq-drop-processing-selector qq-drop-processing">
        <span>{{ trans("common.button.drop") }}</span>
        <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
    </span>

    <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
        @include("partials/file", ["file" => ''])
    </ul>

    <ul class="qq-uploaded-list-selector qq-upload-list">
        @if(isset($files))
            @foreach($files as $file)
                @include('partials.file', ["file" => $file])
            @endforeach
        @endif
    </ul>


    <dialog class="qq-alert-dialog-selector">
        <div class="qq-dialog-message-selector"></div>
        <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">{{ trans('common.button.close') }}</button>
        </div>
    </dialog>

    <dialog class="qq-confirm-dialog-selector">
        <div class="qq-dialog-message-selector"></div>
        <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">{{ trans('common.button.no') }}</button>
            <button type="button" class="qq-ok-button-selector">{{ trans('common.button.yes') }}</button>
        </div>
    </dialog>

    <dialog class="qq-prompt-dialog-selector">
        <div class="qq-dialog-message-selector"></div>
        <input type="text">
        <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">{{ trans('common.button.cancel') }}</button>
            <button type="button" class="qq-ok-button-selector">{{ trans('common.button.ok') }}</button>
        </div>
    </dialog>

</div>