@extends( 'admin.layouts.default' )

@section('breadcrumbs')
@include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('admin.order')])
@endsection

@section( 'content' )
<div class="container-fluid">
    <div class="row">
        <div role="tabpanel">
            <ul class="nav nav-pills" role="tablist">
                <li class="active"><a href="#diagnosis" aria-controls="diagnosis" role="tab" data-toggle="tab">진단 정보</a></li>
                <li role="presentation" class=""><a href="#certification" aria-controls="certification" role="tab" data-toggle="tab">차량 인증</a></li>
            </ul>

            <div class="tab-content">
                {{--진단 정보--}}
                <div role="tabpanel" class="tab-pane active" id="diagnosis">
                    <div class="col-md-12">
                        <h2>기본 정보</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                            </colgroup>
                            <thead>
                            <th>자동차 등록증</th>
                            <th colspan="2">차대번호</th>
                            <th>주행거리</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                                <td>양호</td>
                                <td>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                                <td>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            <tr>
                                <th>색상</th>
                                <td colspan="3">흰색</td>
                            </tr>
                            <tr>
                                <th>추가옵</th>
                                <td colspan="3">제논 헤드램프(HID)</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        <h2>주요 외판</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                            </colgroup>
                            <thead>
                            <th>전방</th>
                            <th>후방</th>
                            <th>좌측</th>
                            <th>우측</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                                <td>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                                <td>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                                <td>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="4">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            <tr>
                                <th>교환</th>
                                <td colspan="3">사이드실 좌</td>
                            </tr>
                            <tr>
                                <th>부식</th>
                                <td colspan="3">리어도어 </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h2>주요 내판 및 골격</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                            </colgroup>
                            <thead>
                            <th colspan="2">차량 하단</th>
                            <th colspan="2">엔진</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                                <td>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                                <td>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                                <td>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="4">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            <tr>
                                <th>교환</th>
                                <td colspan="3">프론트 패널</td>
                            </tr>
                            <tr>
                                <th>용접/판금 수리</th>
                                <td colspan="3">리어도어 </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h2>사고수리 / 상태</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:120px;'>
                                <col style='width:100px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                            </colgroup>

                            <tbody>
                            <tr>
                                <th>부식</th>
                                <td>주요골격수리</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <br>
                                    <audio controls>
                                    </audio>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h2>침수 흔적</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:120px;'>
                                <col style='width:100px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                            </colgroup>

                            <tbody>
                            <tr>
                                <th>실내악취</th>
                                <td>수분 및 오염 (좌)</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <br>
                                    <audio controls>
                                    </audio>
                                </td>
                            </tr>
                            <tr>
                                <th>앞좌석 실내바닥</th>
                                <td>수분 및 오염 (우)</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <br>
                                    <audio controls>
                                    </audio>
                                </td>
                            </tr>
                            <tr>
                                <th>트렁크 실내바닥</th>
                                <td>의심</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <br>
                                    <audio controls>
                                    </audio>
                                </td>
                            </tr>
                            <tr>
                                <th>엔진</th>
                                <td>흙먼지 이물질 (무)</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <br>
                                    <audio controls>
                                    </audio>
                                </td>
                            </tr>
                            <tr>
                                <th>부식</th>
                                <td>주요골격수리</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <br>
                                    <audio controls>
                                    </audio>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h2>차량내외부 점검</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:120px;'>
                                <col style='width:100px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                            </colgroup>

                            <tbody>
                            <tr>
                                <th>차량외판</th>
                                <td>부</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <br>
                                    <audio controls>
                                    </audio>
                                </td>
                            </tr>
                            <tr>
                                <th>차량 실내점검</th>
                                <td>상</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h2>주행 테스트</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:120px;'>
                                <col style='width:100px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                            </colgroup>
                            <tbody>
                            <tr>
                                <th>엔진 작동상태</th>
                                <td colspan="3">
                                    정비요
                                </td>
                            </tr>
                            <tr>
                                <th>변속기 작동상태</th>
                                <td colspan="3">
                                    양호
                                </td>
                            </tr>
                            <tr>
                                <th>브레이크 작동상태</th>
                                <td colspan="3">
                                    양호
                                </td>
                            </tr>
                            <tr>
                                <th>얼라인먼트</th>
                                <td colspan="3">
                                    양호
                                </td>
                            </tr>
                            <tr>
                                <th>조향장치 작동상태</th>
                                <td colspan="3">
                                    양호
                                </td>
                            </tr>
                            <tr>
                                <th>작동상태 의견</th>
                                <td colspan="3">
                                    <audio controls>

                                    </audio>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h2>차량 작동상태 점검</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:120px;'>
                                <col style='width:100px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                            </colgroup>
                            <tbody>
                            <tr>
                                <th>엔진 작동상태</th>
                                <td>양호</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            <tr>
                                <th>변속기 작동상태</th>
                                <td>양호</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            <tr>
                                <th>브레이크 작동상태</th>
                                <td>양호</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            <tr>
                                <th>조향장치 작동상태</th>
                                <td>양호</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            <tr>
                                <th>오일 등 누유상</th>
                                <td>양호</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h2>차량 작동상태 점검</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:120px;'>
                                <col style='width:100px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                            </colgroup>
                            <tbody>
                            <tr>
                                <th>타이어 상태</th>
                                <td>양호</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            <tr>
                                <th>엔진오일 상태</th>
                                <td>양호</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            <tr>
                                <th>냉각수 상태</th>
                                <td>양호</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            <tr>
                                <th>브레이크패드 상태</th>
                                <td>양호</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            <tr>
                                <th>배터리 상태</th>
                                <td>양호</td>
                                <td colspan="2">
                                    <figure class="overlay overlay-hover">
                                        <img width="150px;" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                    <figure class="overlay overlay-hover">
                                        <img width="150px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzUwcHgiIGhlaWdodD0iMTUwcHgiIHZpZXdCb3g9IjAgMCAzNTAgMTUwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzNTAgMTUwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIzNTAiIGhlaWdodD0iMTUwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0xMzEuOTEsNDEuMXY2Ny44aDg2LjE4VjQxLjFIMTMxLjkxeiBNMjExLjE0NiwxMDEuNTQ5SDEzOS4yNlY0OC40NTFoNzEuODg3VjEwMS41NDl6Ii8+DQoJPHBvbHlnb24gZmlsbD0iI0Q4RDhEOCIgcG9pbnRzPSIxNDMuMTI5LDk1LjgzIDE1Ny45NDMsODAuMjU4IDE2My40OTQsODIuNjYgMTgxLjAwOSw2NC4wMTQgMTg3LjkwMiw3Mi4yNiAxOTEuMDE0LDcwLjM4MiANCgkJMjA3Ljg0OCw5NS44MyAJIi8+DQoJPGNpcmNsZSBmaWxsPSIjRDhEOEQ4IiBjeD0iMTYwLjI0MyIgY3k9IjYxLjk1NCIgcj0iNi40NzIiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                                        <figcaption class="overlay-panel overlay-background overlay-fade flex flex-center flex-middle text-center">
                                            <div>Client Name</div>
                                        </figcaption>
                                        <a class="position-cover" href="#"></a>
                                    </figure>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h2>차량 작동상태 점검</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:120px;'>
                                <col style='width:100px;'>
                                <col style='width:120px;'>
                                <col style='width:120px;'>
                            </colgroup>
                            <tbody>
                            <tr>
                                <th>타이어 상태</th>
                                <td colspan="3">
                                    <audio controls></audio>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{--차량 인증--}}
                <div role="tabpanel" class="tab-pane" id="certification">
                    {{--기본 정보--}}
                    <div class='col-md-12'>
                        <h2>기본 정보</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:120px;'>
                                <col style='width:270px;'>
                                <col style='width:120px;'>
                                <col style='width:270px;'>
                            </colgroup>
                            <tbody>
                            <tr>
                                <th>자동차 등록번호</th>
                                <td>
                                    <input type="text" style="width: 80%;">
                                </td>
                                <th>주행거리(km)</th>
                                <td>
                                    <input type="text" style="width: 80%;">
                                </td>
                            </tr>
                            <tr>
                                <th>차대번호</th>
                                <td>
                                    <input type="text" style="width: 80%;">
                                </td>
                                <th>동일성확인</th>
                                <td>
                                    <select>
                                        <option selected> -- 선택하세요 --</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>최초등록일</th>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class='fa fa-calendar'></i></span>
                                        <input type="text" class="form-control datepicker" data-format="YYYY-MM-DD" style="width: 78%;">
                                    </div>
                                </td>
                                <th>사용월수</th>
                                <td>
                                    <input type="text" style="width: 80%;">
                                </td>
                            </tr>
                            <tr>
                                <th>차명</th>
                                <td>
                                    <input type="text" style="width: 80%;">
                                </td>
                                <th>세부모델</th>
                                <td>
                                    <input type="text" style="width: 80%">
                                </td>
                            </tr>
                            <tr>
                                <th>색상</th>
                                <td>
                                    <select>
                                        <option selected> -- 선택하세요 --</option>
                                    </select>
                                </td>
                                <th>차</th>
                                <td>
                                    <input type="text" style="width: 80%">
                                </td>
                            </tr>
                            <tr>
                                <th>연식 (형식)</th>
                                <td>
                                    <input type="text" style="width: 80%;">
                                </td>
                                <th>변속기</th>
                                <td>
                                    <input type="text" style="width: 80%;">
                                </td>
                            </tr>
                            <tr>
                                <th>사용연료</th>
                                <td>
                                    <input type="text" style="width: 80%;">
                                </td>
                                <th>배기량 (cc)</th>
                                <td>
                                    <input type="text" style="width: 80%;">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{--이력 정보--}}
                    <div class='col-md-12'>
                        <h2>이력 정보</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:175px;'>
                                {{--<col style='width:200px;'>--}}
                                {{--<col style='width:120px;'>--}}
                                {{--<col style='width:270px;'>--}}
                            </colgroup>
                            <tbody>
                            <tr>
                                <th>보험사고 이력</th>
                                <td colspan="3">
                                    <input type="text">건 &nbsp;&nbsp;&nbsp;
                                    <button>사고이력 이미지 업로드</button>
                                </td>
                            </tr>
                            <tr>
                                <th>소유자 이력</th>
                                <td colspan="3">
                                    <input type="text">명
                                </td>
                            </tr>
                            <tr>
                                <th>정비 이력</th>
                                <td colspan="3">
                                    <input type="text">번
                                </td>
                            </tr>
                            <tr>
                                <th>용도변경이력</th>
                                <td colspan="3">
                                    <input type="radio" name="ck">있음
                                    <input type="radio" name="ck">없음
                                    <br>
                                    <select>
                                        <option selected> -- 선택하세요 -- </option>
                                    </select>
                                    <br>
                                    <button>이력 추가</button>
                                </td>
                            </tr>
                            <tr>
                                <th>차고지 이력</th>
                                <td colspan="3">
                                    <select>
                                        <option selected> -- 선택하세요 -- </option>
                                    </select>
                                    <select>
                                        <option selected> -- 선택하세요 -- </option>
                                    </select>
                                    <br>
                                    <button>이력 추가</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{--가격 산정--}}
                    <div class='col-md-12'>
                        <h2>가격 산정</h2>
                        <table class="table table-bordered">
                            <colgroup>
                                <col style='width:175px;'>
                                {{--<col style='width:200px;'>--}}
                                {{--<col style='width:120px;'>--}}
                                {{--<col style='width:270px;'>--}}
                            </colgroup>
                            <tbody>
                            <tr>
                                <th>기준가격(Pst)</th>
                                <td colspan="3">
                                    <input type="text">만원
                                </td>
                            </tr>
                            <tr>
                                <th rowspan='4'>기본평가(A)</th>
                                <td>
                                    <input type="checkbox"> 신차출고가격
                                </td>
                                <td>
                                    부가세
                                    <input type="radio">포함
                                    <input type="radio">제와
                                </td>
                                <td>
                                    <input type="text">만원
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox"> 등록일 보정(+)
                                </td>
                                <td>
                                    <input type="radio">표준
                                    <input type="radio">초과
                                    <input type="radio">미달
                                </td>
                                <td>
                                    <input type="text">만원
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox"> 장착품(추가옵션)
                                </td>
                                <td colspan="2">
                                    <input type="text">만원
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox"> 색상 등 기타
                                </td>
                                <td colspan="2">
                                    <input type="text">만원
                                </td>
                            </tr>

                            <tr>
                                <th rowspan="3">사용이력</th>
                                <td>
                                    <input type="checkbox"> 주행거리 (+)
                                </td>
                                <td>
                                    <input type="radio">표준
                                    <input type="radio">초과
                                    <input type="radio">미달
                                </td>
                                <td>
                                    <input type="text">만원
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    <input type="checkbox"> 사고/수리이력
                                </td>
                                <td colspan="2">
                                    무사고 <input type="checkbox">
                                    단순교환 <input type="checkbox">
                                    중손상 <input type="checkbox">
                                    대손상 <input type="checkbox">
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>감가금액</td>
                                <td>
                                    <input type="text">만원
                                </td>
                            </tr>
                            <tr>
                                <th rowspan="6">차량 성능 상태(C)</th>
                                <td>
                                    <input type="checkbox"> 휠/타이
                                </td>
                                <td colspan="2">
                                    양호 <input type="checkbox">
                                    보통 <input type="checkbox">
                                    불량/정비요 <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox"> 외관(외장)
                                </td>
                                <td colspan="2">
                                    양호 <input type="checkbox">
                                    보통 <input type="checkbox">
                                    불량/정비요 <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox"> 실내/내장
                                </td>
                                <td colspan="2">
                                    양호 <input type="checkbox">
                                    보통 <input type="checkbox">
                                    불량/정비요 <input type="checkbox">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox"> 주요장치/성능
                                </td>
                                <td colspan="2">
                                    양호 <input type="checkbox">
                                    보통 <input type="checkbox">
                                    불량/정비요 <input type="checkbox">
                                </td>
                            </tr>
                            <tr>

                            </tr>
                            <tr>
                                <td>감가금액</td>
                                <td colspan="2">
                                    <input type="text">만원
                                </td>
                            </tr>
                            <tr>
                                <th>평가금액</th>
                                <td colspan="2">V=Pst+(A+B+C+S)</td>
                                <td>
                                    <input type="text">만원
                                </td>
                            </tr>
                            <tr>
                                <th>종합 의견</th>
                                <td colspan="3">
                                    <input type="text">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>



    </div>



    <br>
    <div class="row">

        <div class="col-md-6">

            <a href="{{ route('order.index') }}" class="btn btn-primary" style="margin-left: 15px;">주문목록</a>

        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('order.edit', $order->id) }}" class="btn btn-default" style="margin-right: 15px;">진단 결과 보기</a>
        </div>

    </div>


</div><!-- container -->
@endsection






