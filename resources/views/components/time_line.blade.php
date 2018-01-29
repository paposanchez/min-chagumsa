@if($order_item->type_cd == 121)
    <div class="card-header">
        <h2>
            <small>진단</small>
        </h2>
    </div>
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
        <label for="" class="control-label col-md-3">진단신청</label>
        <div class="col-md-6">
            <span class="help-block">{{ $order_item->diagnosis->created_at }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
        <label for="" class="control-label col-md-3">예약확정</label>
        <div class="col-md-6">
            <span class="help-block">{{ $order_item->diagnosis->status_cd == 113 ? $order_item->diagnosis->confirm_at : '-' }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
        <label for="" class="control-label col-md-3">검토중</label>
        <div class="col-md-6">
            <span class="help-block">{{ $order_item->diagnosis->status_cd == 114 ? $order_item->diagnosis->start_at : '-' }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
        <label for="" class="control-label col-md-3">발급완료</label>
        <div class="col-md-6">
            <span class="help-block">{{ $order_item->diagnosis->status_cd == 115 ? $order_item->diagnosis->completed_at : '-' }}</span>
        </div>
    </div>
@endif
@if($order_item->type_cd == 122)
    <div class="card-header">
        <h2>
            <small>인증</small>
        </h2>
    </div>
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
        <label for="" class="control-label col-md-3">인증서신청</label>
        <div class="col-md-6">
            <span class="help-block">{{ $order_item->certificate->created_at }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
        <label for="" class="control-label col-md-3">검토중</label>
        <div class="col-md-6">
            <span class="help-block">{{ $order_item->certificate->status_cd == 114 ? $order_item->certificate->updated_at : '-' }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
        <label for="" class="control-label col-md-3">발급완료</label>
        <div class="col-md-6">
            <span class="help-block">{{ $order_item->certificate->status_cd == 115 ? $order_item->certificate->completed_at : '-'}}</span>
        </div>
    </div>
@endif
@if($order_item->type_cd == 123)
    <div class="card-header">
        <h2>
            <small>보증</small>
        </h2>
    </div>
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
        <label for="" class="control-label col-md-3">보증신청</label>
        <div class="col-md-6">
            <span class="help-block">{{ $order_item->warranty->status_cd == 112 ? $order_item->warranty->created_at : '-'}}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
        <label for="" class="control-label col-md-3">검토중</label>
        <div class="col-md-6">
            <span class="help-block">{{ $order_item->warranty->status_cd == 114 ? $order_item->warranty->updated_at : '-' }}</span>
        </div>
    </div>
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
        <label for="" class="control-label col-md-3">발급완료</label>
        <div class="col-md-6">
            <span class="help-block">{{ $order_item->warranty->status_cd == 115 ? $order_item->warranty->completed_at : '-' }}</span>
        </div>
    </div>
@endif