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
                            <label for="name">{{ trans('core::language.name') }}</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="" value="{{ old('name', @$page->name) }}">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">{{ trans('core::language.description') }}</label>
                            <textarea type="description" id="description" name="description" class="form-control" placeholder="" value="">{{ old('description', @$page->description) }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content">{{ trans('core::language.content') }}</label>
                            <textarea type="content" id="content" name="content" class="form-control editor" rows="20" placeholder="" value="">{{ old('content', @$page->content) }}</textarea>
                            @if($errors->has('content'))
                                <span class="help-block">{{ $errors->first('content') }}</span>
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
    
                <div class="form-group{{ $errors->has('pos') ? ' has-error' : ''  }}">
                    <label for="pos">{{ trans('core::language.position') }}</label>&nbsp;
                    <input type="number" value="{{ old('pos', @$page->pos ?: $maxPos) }}" name="pos" class="form-control">
                    @if($errors->has('pos'))
                        <span class="help-block">{{ $errors->first('pos') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="published">{{ trans('core::language.published') }}</label><br>
                    <label class="switch switch-primary"><input type="checkbox" name="published" value="1" {{ @$page->published ? 'checked=""' : '' }}><span></span></label>
                </div>
            </div>
            <div id="app">
                <image-box input-name="featured_image" data="{{ @$page->featured_image }}"></image-box>   
            </div>
        </div>
    </div>