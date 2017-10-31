@extends( 'web.layouts.default' )

@section('breadcrumbs', Breadcrumbs::render('web.community.faq'))

@section( 'content' )
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                @include( 'web.partials.submenu.community' )
            </div>

            <div class="col-md-9">


                <div class="ibox-title">
                    <h5><span class='label label-default'>{{ $data->post_kind->code_name }}</span>
                        &nbsp;{{ isset($data) ? $data->subject:'' }}</h5>
                    <div class="ibox-tools">
                        <small>HIT <span class='text-danger'>{{ isset($data) ? number_format($data->hits) : 0 }}</span>
                        </small>
                        <small>DATE <span
                                    class='text-danger'>{{ isset($data) ? $data->created_at->format('Y-m-d H:i:s') : '-' }}</span>
                        </small>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! isset($data) ? $data->contents:'' !!}

                        <div class="hr-line-dashed"></div>

                        <a href="{{ route('seller.shop.notice.index', Input::get()) }}" class="btn btn-default"><i
                                    class="fa fa-list"></i> 목록</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
