<!doctype html>
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<html lang="ko">
<head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"> -->

        <title>{{ $page_title }}</title>

        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">


        <link href="/assets/vendors/document/css/pure-min.css" rel="stylesheet">

        <!--[if lte IE 8]>
        <link href="/assets/vendors/document/css/grids-responsive-old-ie-min.css" rel="stylesheet">
        <![endif]-->
        <!--[if gt IE 8]><!-->
        <link href="/assets/vendors/document/css/grids-responsive-min.css" rel="stylesheet">
        <!--<![endif]-->


        <link href="/assets/vendors/document/css/theme.css" rel="stylesheet">

</head>

<body class="{{ $document_type }}">
        <!-- header -->

        <div class="header">
                <div class="container">
                        <div class="pure-g">
                                <div class="pure-u-1-2">
                                        <h1 class="document-title">{{ $page_title }}</h1>
                                </div>
                                <div class="pure-u-1-2 text-right">
                                        <h3 class="document-number">{{ $data->chakey }}</h3>
                                        <h6>발급일시 : {{ $data->issued_at->format('Y년 m월 d일 H:i') }}</h6>
                                </div>
                        </div>
                </div>
        </div>

        <!-- 본문 -->
        <div class="body">

                <div class="container">

                        @include("partials.document.information", ['data' => $data, 'report_type' => $report_type])

                        @if($report_type == 'D')
                        @include("partials.document.diagnosis", ['data' => $data, 'report_type' => $report_type])
                        @endif

                        @if($report_type == 'C')
                        @include("partials.document.certificate", ['data' => $data, 'report_type' => $report_type])
                        @endif

                        @if($report_type == 'W')
                        @include("partials.document.warranty", ['data' => $data, 'report_type' => $report_type])
                        @endif
                </div>

                @include("partials.document.etc", ['data' => $data, 'report_type' => $report_type])

                @include("partials.document.detail", ['data' => $data, 'report_type' => $report_type])
        </div>



        <!-- footer -->
        <div class="footer">
                <div class="container">
                        <div class="pure-g">
                                <div class="pure-u-3-24 left">
                                        @if($report_type == 'D')
                                        <img src="../assets/img/logo-bosch.png" class="logo-partner">
                                        @elseif($report_type == 'C')
                                        <img src="../assets/img/logo-hnt.png" class="logo-partner">
                                        @else
                                        <img src="../assets/img/logo-jimbros.png" class="logo-partner">
                                        @endif
                                </div>

                                <div class="pure-u-18-24">
                                        @if($report_type == 'W')
                                        <div class="copyright">
                                                우리회사는 보험계약자와 해당 보험약관에 의하여 보험계약을 체결하고 그 증거로써 이 보증서를 발급합니다.<br/>
                                                Copyright © JIMBROS INC. All rights reserved.
                                        </div>
                                        @else
                                        <div class="copyright">
                                                위 평가서 내용은 차검사에서 보증합니다. 명시된 유효기간 내 평가서 내용의 오류 또는 그로 인해 발생하는 피해에 대해서는 차검사를 통해 보호받을 수 있습니다<br/>
                                                Copyright © JIMBROS INC. All rights reserved.
                                        </div>
                                        @endif

                                </div>
                                <div class="pure-u-3-24 text-right">
                                        <img src="../assets/img/logo-chagumsa.png" class="logo-chagumsa">
                                </div>
                        </div>

                </div>
        </div>
        {{-- 분기 필요 --}}






</body>

</html>
