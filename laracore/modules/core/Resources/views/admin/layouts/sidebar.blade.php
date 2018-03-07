<div id="sidebar">
    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="index.html" class="sidebar-brand">
                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Pro</strong>UI</span>
            </a>
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a href="{{ config('cms.admin_prefix') }}" class="active"><i class="gi gi-dashboard sidebar-nav-icon"></i> <span class="sidebar-nav-mini-hide">{{ trans('core::language.dashboard') }}</span></a>
                </li>
                <li>
                    <a href="{{ route('pages.index') }}"><i class="sidebar-nav-icon fa fa-file-text"></i><span class="sidebar-nav-mini-hide">{{ trans('page::language.page') }}</span></a>
                </li>
                
                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-file-photo-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ trans('post::language.post') }}</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('post.categories.index') }}">{{ trans('core::language.categories') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('posts.index') }}">{{ trans('post::language.post') }}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-product-hunt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ trans('product::language.product') }}</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('product.categories.index') }}">{{ trans('core::language.categories') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}">{{ trans('product::language.product') }}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admins.index') }}"><i class="fa fa-user-circle-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide"></span>{{ trans('core::language.admin') }}</a>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ trans('core::language.setting') }}</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('widgets.index') }}"><i class="fa fa-code sidebar-nav-icon" aria-hidden="true"></i><span class="sidebar-nav-mini-hide"></span>{{ trans('widget::language.widget') }}</a>
                        </li>
                        <li>
                            <a href="page_ecom_orders.html">Orders</a>
                        </li>
                        <li>
                            <a href="page_ecom_order_view.html">Order View</a>
                        </li>
                        <li>
                            <a href="page_ecom_products.html">Products</a>
                        </li>
                        <li>
                            <a href="page_ecom_product_edit.html">Product Edit</a>
                        </li>
                        <li>
                            <a href="page_ecom_customer_view.html">Customer View</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>