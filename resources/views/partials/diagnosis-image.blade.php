<a href="http://image.chagumsa.com/diagnosis/{{ $file['id'] }}-400.png"
   class="diagnosis-thumbnail pull-right"
   data-toggle="lightbox"
   data-title="{{ $file['original'] }}"
   data-footer="{{ $file['created_at'] }} | {{ Helper::formatBytes($file['size']) }} | <a href='http://image.chagumsa.com/diagnosis/{{ $file['id'] }}.png' target='_blank'>원본다운로드</a> | <a href='#' class='text-danger diagnosis-file-delete' data-id='{{ $file['id'] }}'>삭제</a>"
   data-type="image"
   data-gallery="diagnosis-gallery"
>
    <img
            src="http://image.chagumsa.com/diagnosis/{{ $file['id'] }}-264.png"
            class="img-responsive"
            style="width:35px;height:35px;display:inline-block;">
</a>
