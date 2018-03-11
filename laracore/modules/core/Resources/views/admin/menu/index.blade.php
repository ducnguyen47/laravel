@extends($viewExtend)
@section('content')
    {!! Menu::render() !!}
@endsection
@push('footer')
    {!! Menu::scripts() !!}
@endpush