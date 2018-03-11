@extends($viewExtend)
@section('content')
<form action="{{ route('admin.settings.update') }}" method="post">
    {!! csrf_field() !!}
    <div class="row websiteSetting" id="app">
        <div class="col-md-12">
            <images-box lable="Slider" input-name="slider" data="{{ option('slider') }}"></images-box>
        </div>
    </div>
    <div class="action-btn">
        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> {{ trans('core::language.submit') }}</button>
        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> {{ trans('core::language.reset') }}</button>
    </div>
</form>
@endsection