<div class="row">
        <div class="col-md-8">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2>{{ trans('core::language.basic_information') }}</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">{{ trans('admin::language.name') }}</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="" value="{{ old('name', @$admin->name) }}">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">{{ trans('admin::language.email') }}</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="" value="{{ old('email', @$admin->email) }}">
                            @if($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone">{{ trans('admin::language.phone') }}</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="" value="{{ old('phone', @$admin->phone) }}">
                            @if($errors->has('phone'))
                                <span class="help-block">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address">{{ trans('admin::language.address') }}</label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="" value="{{ old('address', @$admin->address) }}">
                            @if($errors->has('address'))
                                <span class="help-block">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>
                   <div class="col-md-12">
                       <div class="alert alert-info">
                            <i class="fa fa-fw fa-info-circle"></i> {{ trans('admin::language.enter_password_desc') }}
                        </div>
                   </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">{{ trans('admin::language.password') }}</label>
                            <input type="text" id="password" name="password" class="form-control" placeholder="">
                            @if($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('password_confirm') ? ' has-error' : '' }}">
                            <label for="password_confirm">{{ trans('admin::language.password_confirm') }}</label>
                            <input type="text" id="password_confirm" name="password_confirm" class="form-control" placeholder="">
                            @if($errors->has('password_confirm'))
                                <span class="help-block">{{ $errors->first('password_confirm') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block">
                <div class="block-title">
                    <h2>{{ trans('core::language.general') }}</h2>
                </div>
                <div class="form-group">
                    <label for="published">{{ trans('core::language.published') }}</label>&nbsp;
                    <label class="switch switch-primary"><input type="checkbox" name="published" value="1" {{ @$admin->published ? 'checked=""' : '' }}><span></span></label>
                </div>
            </div>
            <div id="app">
                <image-box input-name="avatar" data="{{ @$admin->avatar }}"></image-box>   
            </div>
        </div>
    </div>