<div id="sidebar">
    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="{{ config('cms.admin_prefix') }}" class="sidebar-brand">
                <center><img width="40px" src="{{ option('site_logo') }}" alt=""></center>
            </a>
            <ul class="sidebar-nav">
                <li>
                    <a href="{{ config('cms.admin_prefix') }}" class="{{ check_do_active('admin') }}"><i class="gi gi-dashboard sidebar-nav-icon"></i> <span class="sidebar-nav-mini-hide">{{ trans('core::language.dashboard') }}</span></a>
                </li>
                <li>
                    <a href="{{ route('pages.index') }}" class="{{ check_do_active('admin/pages*') }}"><i class="sidebar-nav-icon fa fa-file-text"></i><span class="sidebar-nav-mini-hide">{{ trans('page::language.page') }}</span></a>
                </li>
                
                <li>
                    <a href="#" class="sidebar-nav-menu {{ check_do_active('admin/post*') }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-file-photo-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ trans('post::language.post') }}</span></a>
                    <ul style="display: {{ check_do_active('admin/post*', true) }}">
                        <li>
                            <a href="{{ route('post.categories.index') }}">{{ trans('core::language.categories') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('posts.index') }}">{{ trans('post::language.post') }}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu {{ check_do_active('admin/product*') }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-product-hunt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ trans('product::language.product') }}</span></a>
                    <ul style="display: {{ check_do_active('admin/product*', true) }}">
                        <li>
                            <a href="{{ route('product.categories.index') }}">{{ trans('core::language.categories') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}">{{ trans('product::language.product') }}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admins.index') }}" class="{{ check_do_active('admin/admin*') }}"><i class="fa fa-user-circle-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"></span>{{ trans('core::language.admin') }}</a>
                </li>

                <li>
                    <a href="{{ route('widgets.index') }}" class="{{ check_do_active('admin/widget*') }}"><i class="fa fa-code sidebar-nav-icon" aria-hidden="true"></i><span class="sidebar-nav-mini-hide"></span>{{ trans('widget::language.widget') }}</a>
                </li>

                <li>
                    <a href="{{ route('admin.navigation') }}" class="{{ check_do_active('admin/navigation*') }}"><i class="fa fa-bars sidebar-nav-icon" aria-hidden="true"></i><span class="sidebar-nav-mini-hide"></span>Menu</a>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu {{ check_do_active('admin/setting*') }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cogs sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ trans('core::language.setting') }}</span></a>
                    <ul style="display: {{ check_do_active('admin/setting*', true) }}">
                        <li>
                            <a href="{{ route('admin.settings') }}">{{ trans('core::language.setting') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings.template') }}">{{ trans('core::language.template') }}</a>
                        </li>

                        <li>
                            <a href="{{ route('admins.edit', request()->user()->id) }}">{{ trans('admin::language.profile') }}</a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}">{{ trans('admin::language.logout') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>