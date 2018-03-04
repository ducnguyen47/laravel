<?php
namespace Modules\Core\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Auth::guard('admin')->user());
        return view('core::layouts.app');
    }
}
