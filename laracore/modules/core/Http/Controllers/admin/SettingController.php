<?php
namespace Modules\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        theme()->setTitle(trans('core::language.setting'));
        breadcrumb()->add(trans('core::language.setting'), route('admin.settings'));
        breadcrumb()->add(trans('core::language.setting'));
        theme()->setTheme('core::setting.general');
        return theme()->render();
    }

    public function template()
    {
        theme()->setTitle(trans('core::language.template'));
        breadcrumb()->add(trans('core::language.template'), route('admin.settings.template'));
        breadcrumb()->add(trans('core::language.template'));
        theme()->setTheme('core::setting.template');
        return theme()->render();
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token']);

        foreach ($data as $key => $value) {
            $value = is_array($value) ? json_encode($value) : $value;
            option()->save($key, $value);
        }

        flash(trans('core::language.update_success'))->success();
        return back();
    }
}
