@extends($viewExtend)
@section('content')
    <div class="block full">
        <div class="block-title">
            <a href="{{ route('pages.create') }}" class="btn btn-alt btn-sm btn-default"><i class="fa fa-plus-circle"></i>
            {{ trans('core::language.add_new') }}</a>
        </div>
        <div class="table-responsive">
            <table id="datatable-list" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>{{ trans('core::language.name') }}</th>
                        <th>{{ trans('core::language.published') }}</th>
                        <th>{{ trans('core::language.position') }}</th>
                        <th class="text-center">{{ trans('core::language.action') }}</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($pages as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td class="text-center"><a href="{{ route('pages.edit', $item->id) }}">{{ $item->name }}</a></td>
                            <td><label class="switch switch-primary"><input type="checkbox" name="published" onclick="updatePublishedItem('{{ route('pages.update', $item->id) }}', '{{ $item->published ? 0 : 1 }}')" {{ $item->published ? 'checked=""' : '' }}><span></span></label></td>
                            <td><input onchange="updatePositionItem('{{ route('pages.update', $item->id) }}', this.value)" type="number" min="1" class="form-control" value="{{ $item->pos }}"></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('pages.edit', $item->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                    <a onclick="deleteItem('{{ $item->id }}', '{{ route('pages.destroy', $item->id) }}');" href="javascript:void(0);" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection