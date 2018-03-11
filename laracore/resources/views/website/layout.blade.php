<!doctype html>
<html class="no-js" lang="vi">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="ducnguyenhoangm@gmail.com" />

@include('website::partial.seo')
@include('website::partial.style')
</head>
<body>
    <div id="wrap" class="layout-1"> 
        @include('website::partial.header')
        @yield('content')
        @include('website::partial.footer')
    </div>
    @include('website::partial.script')
</body>
</html>