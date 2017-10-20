<a href="http://mme.chagumsa.com/resize?logo=1&r=1&width=400&qty=80&url={{ $file['preview'] }}"
   class="diagnosis-thumbnail pull-right"
   data-toggle="lightbox"
   data-title="{{ $file['original'] }}"
   data-footer="{{ $file['created_at'] }} | {{ Helper::formatBytes($file['size']) }} | <a href='{{ $file['preview'] }}' target='_blank'>원본보기</a> | <a href='#' class='text-danger diagnosis-file-delete' data-id='{{ $file['id'] }}'>삭제</a>"
   data-type="image"
   data-gallery="diagnosis-gallery"
>
    <img
            src="http://mme.chagumsa.com/resize?logo=1&r=1&width=400&qty=80&url={{ $file['preview'] }}"
            class="img-responsive"
            style="width:35px;height:35px;display:inline-block;">
</a>
