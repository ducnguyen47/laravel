<div class="row" id="app">
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
                            <input type="text" id="name" name="name" class="form-control" placeholder="" value="{{ old('name', @$product->name) }}">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">{{ trans('core::language.description') }}</label>
                            <textarea type="description" id="description" name="description" class="form-control" placeholder="" value="">{{ old('description', @$product->description) }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content">{{ trans('core::language.content') }}</label>
                            <textarea type="content" id="content" name="content" class="form-control editor" rows="20" placeholder="" value="">{{ old('content', @$product->content) }}</textarea>
                            @if($errors->has('content'))
                                <span class="help-block">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <images-box lable="Images" input-name="images" data="{{ @$product->images ? json_encode(@$product->images) : '' }}"></images-box>
        </div>
        <div class="col-md-4">
            <div class="block">
                <div class="block-title">
                    <h2>{{ trans('core::language.general') }}</h2>
                </div>
    
                <div class="form-group{{ $errors->has('pos') ? ' has-error' : ''  }}">
                    <label for="pos">{{ trans('core::language.position') }}</label>&nbsp;
                    <input type="number" value="{{ old('pos', @$product->pos ?: $maxPos) }}" name="pos" class="form-control">
                    @if($errors->has('pos'))
                        <span class="help-block">{{ $errors->first('pos') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="published">{{ trans('core::language.published') }}</label><br>
                    <label class="switch switch-primary"><input type="checkbox" name="published" value="1" {{ @$product->published ? 'checked=""' : '' }}><span></span></label>
                </div>
            </div>

            <div class="block">
                <div class="block-title">
                    <h2>{{ trans('product::language.attribute') }}</h2>
                </div>
                <div class="form-group{{ $errors->has('price') ? ' has-error' : ''  }}">
                    <label for="price">{{ trans('product::language.price') }}</label>&nbsp;
                    <input type="number" value="{{ old('price', @$product->price) }}" name="price" class="form-control">
                    @if($errors->has('price'))
                        <span class="help-block">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                 <div class="form-group{{ $errors->has('discount') ? ' has-error' : ''  }}">
                    <label for="discount">{{ trans('product::language.discount') }}</label>&nbsp;
                    <input type="number" value="{{ old('discount', @$product->discount) }}" name="discount" class="form-control">
                    @if($errors->has('discount'))
                        <span class="help-block">{{ $errors->first('discount') }}</span>
                    @endif
                </div>
    
                {{-- <div class="form-group{{ $errors->has('sku') ? ' has-error' : ''  }}">
                    <label for="sku">{{ trans('product::language.sku') }}</label>&nbsp;
                    <input type="text" value="SP{{ old('sku', @$product->sku ?: @$sku)) }}" name="sku" class="form-control">
                    @if($errors->has('sku'))
                        <span class="help-block">{{ $errors->first('sku') }}</span>
                    @endif
                </div> --}}
            </div>

            <div class="block">
                <div class="block-title">
                    <h2>{{ trans('core::language.categories') }}</h2>
                </div>
                <div class="form-group{{ $errors->has('categories') ? 'has-error' : '' }}">
                    <select id="categories" name="categories[]" class="select-chosen" data-placeholder="Choose a Country.." style="width: 250px;" multiple>
                        @foreach($categories as $value)
                            <option {{ @$product->categories ? (@$product->categories->contains($value->id) ? 'selected=""' : '') : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('categories'))
                        <span class="help-block">{{ $errors->first('categories') }}</span>
                    @endif
                </div>
            </div>
            <div id="app">
                <image-box label="{{ trans('core::language.image') }}" input-name="featured_image" data="{{ @$product->featured_image }}"></image-box>
            </div>
        </div>
    </div>