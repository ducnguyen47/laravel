<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>
        <meta name="csrf-token" value="{{ csrf_token() }}">   
        <script type="text/javascript">
            window.CMS =  @json($js_available);
        </script>
        <meta name="description" content="">
        <meta name="author" content="Duc Nguyen">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
        @include('core::layouts.header')
    </head>
    <body>
        <div id="page-wrapper">
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie10"></div>
                </div>
            </div>
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
                @include('core::layouts.sidebar')
                <div id="main-container">
                    <div id="page-content">
                        <div id="page-content">
                            <ul class="breadcrumb breadcrumb-top">
                                @foreach(breadcrumb()->render() as $item)
                                    @if($item['link'])
                                        <li><a href="{{ $item['link'] }}">{{ $item['label'] }}</a></li>
                                    @else
                                        <li>{{ $item['label'] }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            @include('flash::message')
                            @yield('content')
                        </div>
                    </div>
                    <footer class="clearfix">
                        <div class="pull-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a href="#" target="_blank">ducnhm</a>
                        </div>
                        <div class="pull-left">
                            <span id="year-copy"></span> &copy; <a href="#" target="_blank">CMS</a>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
        @include('core::layouts.footer')
        @include('core::layouts.flash')
        @stack('footer')
    </body>
</html>