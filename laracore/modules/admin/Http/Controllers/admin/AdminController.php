<?php
namespace Modules\Admin\Http\Controllers\Admin;

use Modules\Admin\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        $admins = $admins->filter(function ($value, $key) {
            return $value->id !== request()->user()->id;
        });
        breadcrumb()->add('Admin', route('admins.index'));
        breadcrumb()->add(trans('core::language.list'));

        theme()->setTitle(trans('admin::language.admin'));
        theme()->setTheme('admin::admin.index');
        theme()->setData('admins', $admins);

        return theme()->render();
    }

    public function create()
    {
        breadcrumb()->add(trans('admin::language.admin'), route('admins.index'));
        breadcrumb()->add(trans('core::language.create'));
        theme()->setTitle(trans('admin::language.admin_create'));
        theme()->setTheme('admin::admin.create');
        return theme()->render();
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules($request));
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $admin = new Admin($data);
        $admin->save();

        flash(trans('core::language.add_success'))->success();
        return back();
    }

    public function edit(Admin $admin)
    {
        breadcrumb()->add(trans('core::language.admin'), route('admins.index'));
        breadcrumb()->add(trans('core::language.edit'));
        theme()->setTitle('Admin Edit');
        theme()->setTheme('admin::admin.edit');
        theme()->setData('admin', $admin);
        return theme()->render();
    }

    public function update(Request $request, Admin $admin)
    {
        $data = $request->all();
        $this->validate($request, $this->rules($request, $admin));

        $data['published'] = isset($data['published']) ? $data['published'] : 0;
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        flash(trans('core::language.update_success'))->success();
        $admin->update($data);
        return back();
    }

    public function destroy(Request $request, Admin $admin)
    {
        $admin->delete();
        flash(trans('core::language.delete_success'))->success();
        if ($request->wantsJson()) {
            return response()->json([], 200);
        }
        return back();
    }
    protected function rules($request, $item = null)
    {
        return [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191|'.($item ? 'unique:admins,email,'.$item->id : 'unique:admins'),
            'phone' => 'required|max:191',
            'password' => $item ? ($request->password ? 'min:6' : '') : 'required|min:6',
            'password_confirm' => $request->password ? 'required|same:password' : ''
        ];
    }
}
