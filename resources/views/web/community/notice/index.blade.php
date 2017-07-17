@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>고객센터<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 고객센터 <i class="fa fa-angle-right"></i> <span>공지사항</span></div></h2></div>

<div id='sub_wrap'>

	<ul class='menu_tab_wrap'>
		<li><a class='select' href='{{ route('notice.index') }}'>공지사항</a></li>
		<li><a class='' href='{{ route('faq.index') }}'>FAQ</a></li>
		<li><a class='' href='{{ route('inquire.index') }}'>1:1 문의</a></li>
	</ul>

	<div class='br30'></div>

	<div class='board_wrap'>
		<table>
			<colgroup>
				<col style='width:110px;'>
				<col style='width:695px;'>
				<col style='width:135px;'>
				<col style='width:130px;'>
			</colgroup>
			<thead>
				<tr>
					<th>번호</th>
					<th>제목</th>
					<th>작성일</th>
					<th>조회</th>
				</tr>
			</thead>
			<tbody>
			<tr>
				<th><span>공지사항</span></th>
				<td>차검사 사이트 오픈 준비중입니다.</td>
				<th>2017-05-22</th>
				<th>120</th>
			</tr>
				@if($entrys->total())
					@foreach($entrys as $key => $row)
					<tr>
						<th>{{ $start_num - $key }}</th>
						{{--<th><span>공지사항</span></th>--}}
						<td><a href="{{ route("notice.show", ["id" => $row->id]) }}">{{ mb_strimwidth($row->subject, 0, 30, '...') }}</a></td>
						<th>{{ \App\Helpers\Helper::getDbDate($row->created_at, $row->updated_at) }}</th>
						<th>{{ number_format($row->hit) }}</th>
					</tr>
					@endforeach
				@else
					<th colspan="4">등록된 공지사항이 없습니다.</th>
				@endif

			</tbody>
		</table>
	</div>

	<div class='br30'></div>

	<div class='board_pagination_wrap'>
{{--		{!! $entrys->render() !!}--}}
		{{--{{ dd($entrys) }}--}}
		@include('vendor.pagination.web-page', ['paginator' => $entrys])
	</div>

</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
