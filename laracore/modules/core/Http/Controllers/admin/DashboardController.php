<?php
namespace Modules\Core\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Cache;

class DashboardController extends Controller
{
    public function index()
    {
        theme()->setTitle('Dashboard');
        breadcrumb()->add('Dashboard');
        theme()->setTheme('core::layouts.app');
        return theme()->render();
    }
}
