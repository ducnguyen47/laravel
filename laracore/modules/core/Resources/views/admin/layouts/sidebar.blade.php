<div id="sidebar">
    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="{{ config('cms.admin_prefix') }}" class="sidebar-brand">
                <center><img width="40px" src="{{ option('site_logo') }}" alt=""></center>
            </a>
            <ul class="sidebar-nav">
                <li>
                    <a href="{{ config('cms.admin_prefix') }}" class="{{ check_do_active(url(config('cms.admin_prefix'))) }}"><i class="gi gi-dashboard sidebar-nav-icon"></i> <span class="sidebar-nav-mini-hide">{{ trans('core::language.dashboard') }}</span></a>
                </li>
                <li>
                    <a href="{{ route('pages.index') }}" class="{{ check_do_active(route('pages.index')) }}"><i class="sidebar-nav-icon fa fa-file-text"></i><span class="sidebar-nav-mini-hide">{{ trans('page::language.page') }}</span></a>
                </li>
                
                <li>
                    <a href="#" class="sidebar-nav-menu {{ check_do_active([route('post.categories.index'), route('posts.index')]) }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-file-photo-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ trans('post::language.post') }}</span></a>
                    <ul style="display: {{ check_do_active([route('post.categories.index'), route('posts.index')], true) }}">
                        <li>
                            <a href="{{ route('post.categories.index') }}">{{ trans('core::language.categories') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('posts.index') }}">{{ trans('post::language.post') }}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu {{ check_do_active([route('product.categories.index'), route('products.index')]) }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-product-hunt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ trans('product::language.product') }}</span></a>
                    <ul style="display: {{ check_do_active([route('product.categories.index'), route('products.index')], true) }}">
                        <li>
                            <a href="{{ route('product.categories.index') }}">{{ trans('core::language.categories') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}">{{ trans('product::language.product') }}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admins.index') }}" class="{{ check_do_active(route('admins.index')) }}"><i class="fa fa-user-circle-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"></span>{{ trans('core::language.admin') }}</a>
                </li>

                <li>
                    <a href="{{ route('widgets.index') }}" class="{{ check_do_active(route('widgets.index')) }}"><i class="fa fa-code sidebar-nav-icon" aria-hidden="true"></i><span class="sidebar-nav-mini-hide"></span>{{ trans('widget::language.widget') }}</a>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu {{ check_do_active([route('admin.settings')]) }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ trans('core::language.setting') }}</span></a>
                    <ul style="display: {{ check_do_active([route('admin.settings')], true) }}">
                        <li>
                            <a href="{{ route('admin.settings') }}">{{ trans('core::language.setting') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>