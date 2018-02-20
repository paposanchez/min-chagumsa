<script type="text/javascript">
$(window).load(function(){
        function notify(message, type){
                $.growl({
                        message: message
                },{
                        type: type,
                        allow_dismiss: false,
                        label: '닫기',
                        className: 'btn-xs btn-inverse',
                        placement: {
                                from: 'top',
                                align: 'right'
                        },
                        delay: 2500,
                        animate: {
                                enter: 'animated fadeInRight',
                                exit: 'animated fadeOut'
                        },
                        offset: {
                                x: 30,
                                y: 30
                        }
                });
        };


        @if(session()->has('info'))
        setTimeout(function () {
                notify('{!! session('info') !!}', 'info');
        }, 1000)
        @endif

        @if(session()->has('error'))
        setTimeout(function () {
                notify('{!! session('error') !!}', 'danger');
        }, 1000)
        @endif

        @if(session()->has('success'))
        setTimeout(function () {
                notify('{!! session('success') !!}', 'success');
        }, 1000)
        @endif

        @if(session()->has('default'))
        setTimeout(function () {
                notify('{!! session('default') !!}', 'inverse');
        }, 1000)
        @endif
});

</script>
