@extends($viewExtend)
@section('content')
    <div class="block full">
        <div class="block-title">
            <a href="{{ route('widgets.create') }}" class="btn btn-alt btn-sm btn-default"><i class="fa fa-plus-circle"></i>
            {{ trans('core::language.add_new') }}</a>
        </div>
        <div class="table-responsive">
            <table id="datatable-list" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>{{ trans('core::language.name') }}</th>
                        <th>{{ trans('core::language.slug') }}</th>
                        <th>{{ trans('core::language.published') }}</th>
                        <th class="text-center">{{ trans('core::language.action') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($widgets as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td class="text-center"><a href="{{ route('widgets.edit', $item->id) }}">{{ $item->name }}</a></td>
                            <td><code>{{ $item->slug }}</code></td>
                            <td><label class="switch switch-primary"><input type="checkbox" name="published" onclick="updatePublishedItem('{{ route('widgets.update', $item->id) }}', '{{ $item->published ? 0 : 1 }}')" {{ $item->published ? 'checked=""' : '' }}><span></span></label></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('widgets.edit', $item->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                    <a onclick="deleteItem('{{ $item->id }}', '{{ route('widgets.destroy', $item->id) }}');" href="javascript:void(0);" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END widget Content -->
@endsection