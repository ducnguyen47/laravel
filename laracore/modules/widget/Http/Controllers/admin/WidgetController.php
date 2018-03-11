<?php
namespace Modules\Widget\Http\Controllers\Admin;

use Modules\Widget\Models\Widget;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function index()
    {
        $widgets = Widget::all();
        breadcrumb()->add(trans('widget::language.widget'), route('widgets.index'));
        breadcrumb()->add(trans('core::language.list'));

        theme()->setTitle(trans('widget::language.widget'));
        theme()->setTheme('widget::index');
        theme()->setData('widgets', $widgets);

        return theme()->render();
    }

    public function create()
    {
        breadcrumb()->add(trans('widget::language.widget'), route('widgets.index'));
        breadcrumb()->add(trans('core::language.create'));
        theme()->setTitle(trans('widget::language.widget_create'));
        theme()->setTheme('widget::create');
        return theme()->render();
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        $data = $request->all();
        $data['content'] = is_array($data['content']) ? json_encode($data['content']) : $data['content'];
        $data['slug'] = '['.makeSlug($data['name']).']';
        $widget = new widget($data);
        $widget->save();

        flash(trans('core::language.add_success'))->success();
        return back();
    }

    public function edit(Widget $widget)
    {
        breadcrumb()->add(trans('widget::language.widget'), route('widgets.index'));
        breadcrumb()->add(trans('core::language.edit'));
        theme()->setTitle(trans('widget::language.widget_edit'));
        theme()->setTheme('widget::edit');
        theme()->setData('widget', $widget);
        return theme()->render();
    }

    public function update(Request $request, Widget $widget)
    {
        $data = $request->all();
        if (!$request->wantsJson()) {
            $this->validate($request, $this->rules());
            $data['slug'] = '['.makeSlug($data['name']).']';
            $data['content'] = is_array($data['content']) ? json_encode($data['content']) : $data['content'];
            $data['published'] = $request->has('published') ? true : false;
        }
        $widget->update($data);

        flash(trans('core::language.update_success'))->success();
        if ($request->wantsJson()) {
            return response()->json([], 200);
        }
        return back();
    }

    public function destroy(Request $request, Widget $widget)
    {
        $widget->delete();
        flash(trans('core::language.delete_success'))->success();
        if ($request->wantsJson()) {
            return response()->json([], 200);
        }
        return back();
    }
    protected function rules()
    {
        return [
            'name' => 'required'
        ];
    }
}
