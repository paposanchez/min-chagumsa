<div class="header">
    <div class="container">
        <div class="pure-g">
            <div class="pure-u-1-2">
                <h1 class="document-title">
                    @if($report_type == 'D')
                        차검사 진단서
                    @elseif($report_type == 'C')
                        차검사 평가서
                    @else
                        차검사 보증서
                    @endif
                </h1>
            </div>
            <div class="pure-u-1-2 text-right">
                <h3 class="document-number">{{ $data->chakey }}</h3>
                <h6>발급일시 : {{ $data->issued_at->format('Y년 m월 d일 H:i') }}</h6>
            </div>
        </div>
    </div>
</div>