@extends($viewExtend)
@section('content')
<form action="{{ route('admins.store') }}" method="post">
    {!! csrf_field() !!}
    @include('admin::admin.form')
    <div class="action-btn">
        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> {{ trans('core::language.submit') }}</button>
        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> {{ trans('core::language.reset') }}</button>
    </div>
</form>
@endsection