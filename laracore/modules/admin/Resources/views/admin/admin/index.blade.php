@extends($viewExtend)
@section('content')
    <div class="block full">
        <div class="block-title">
            <a href="{{ route('admins.create') }}" class="btn btn-alt btn-sm btn-default"><i class="fa fa-plus-circle"></i>
            {{ trans('core::language.add_new') }}</a>
        </div>
        <div class="table-responsive">
            <table id="datatable-list" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center"><i class="gi gi-user"></i></th>
                        <th>Client</th>
                        <th>Email</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($admins as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td class="text-center"><img width="40px" src="{{ $item->avatar }}" alt="avatar" class=""></td>
                            <td><a href="{{ route('admins.edit', $item->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->email }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('admins.edit', $item->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                    <a onclick="deleteItem('{{ $item->id }}', '{{ route('admins.destroy', $item->id) }}');" href="javascript:void(0);" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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