<?php
namespace Modules\Core\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class MenuController extends Controller
{
    public function index()
    {
        theme()->setTitle('Menu');
        breadcrumb()->add('Menu', route('admin.navigation'));
        breadcrumb()->add('Menu');
        theme()->setTheme('core::menu.index');
        return theme()->render();
    }
}
