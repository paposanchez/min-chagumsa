@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
        'modalClass' => 'flash-modal',
        'title'      => session('flash_notification.title'),
        'body'       => session('flash_notification.message')
        ])
    @else
        <div id="ma-flash" class="alert alert-dismissible alert-autoclose alert-large alert-{{ session('flash_notification.level') }}" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {!! session('flash_notification.message') !!}
        </div>
    @endif
@endif



@if(session()->has('info'))
<div class="alert alert-info alert-dismissible alert-autoclose" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {!! session('info') !!}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible alert-autoclose" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {!! session('error') !!}
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible alert-autoclose" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {!! session('success') !!}
</div>
@endif

@if(session()->has('status'))
<div class="alert alert-default alert-dismissible alert-autoclose" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {!! session('status') !!}
</div>
@endif
