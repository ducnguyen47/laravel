@extends($viewExtend)
@section('content')
<form action="{{ route('admin.settings.update') }}" method="post">
    {!! csrf_field() !!}
    <div class="row">
        <div class="col-md-8">
            <div class="block">
                <div class="block-title">
                    <h2>{{ trans('core::language.basic_information') }}</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                            <label for="site_name">{{ trans('core::language.site_name') }}</label>
                            <input type="text" id="site_name" name="site_name" class="form-control" placeholder="" value="{{ old('site_name', option('site_name')) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                            <label for="site_description">{{ trans('core::language.site_description') }}</label>
                            <textarea type="text" id="site_description" name="site_description" class="form-control" placeholder="" value="">{{ old('site_description', option('site_description')) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                            <label for="site_phone">{{ trans('core::language.site_phone') }}</label>
                            <input type="text" id="site_phone" name="site_phone" class="form-control" placeholder="" value="{{ old('site_phone', option('site_phone')) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                            <label for="site_address">{{ trans('core::language.site_address') }}</label>
                            <input type="text" id="site_address" name="site_address" class="form-control" placeholder="" value="{{ old('site_address', option('site_address')) }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="block">
                <div class="block-title">
                    <h2>{{ trans('core::language.scripts') }}</h2>
                </div>

                <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                            <label for="gg_analytics">{{ trans('core::language.gg_analytics') }}</label>
                            <textarea type="text" id="gg_analytics" name="gg_analytics" rows="4" class="form-control" placeholder="" value="">{{ old('gg_analytics', option('gg_analytics')) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                            <label for="gg_webmastertool">{{ trans('core::language.gg_webmastertool') }}</label>
                            <textarea type="text" id="gg_webmastertool" name="gg_webmastertool" rows="4" class="form-control" placeholder="" value="">{{ old('gg_webmastertool', option('gg_webmastertool')) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                            <label for="live_chat">{{ trans('core::language.live_chat') }}</label>
                            <textarea type="text" id="live_chat" name="live_chat" class="form-control" rows="4" placeholder="" value="">{{ old('live_chat', option('live_chat')) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="app">
                <image-box lable="Logo" input-name="site_logo" data="{{ option(
                    'site_logo') }}"></image-box>

                <image-box lable="Favicon" input-name="site_favicon" data="{{ option(
                    'site_favicon') }}"></image-box>   
            </div>
        </div>
    </div>
    <div class="action-btn">
        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> {{ trans('core::language.submit') }}</button>
        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> {{ trans('core::language.reset') }}</button>
    </div>
</form>
@endsection