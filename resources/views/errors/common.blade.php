@extends( 'layouts.error' )

@section( 'content' )
<div class="container">
        <div class="col-md-10 col-md-offset-1">
                <div class="text-middle text-center">
                        <h1 class=" text-lighter" style="font-size:120px;">XXX</h1>
                        <h5 class="text-muted text-light">보시면 안되는 에러가 발생을 했네요. 최대한 빨리 해결하겠습니다.</h5>
                        <br/>
                        <a href="/" class="btn btn-default">메인으로 돌아가기</a>
                </div>

                <br/>
                @if(config('app.debug'))
                <!-- detail error messge -->
                <code>
                {{ dd($e) }}
                </code>
                @endif

        </div>
</div>
@endsection
