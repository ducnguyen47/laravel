<?php

namespace App\Http\Middleware;

use Modules\Widget\Models\Widget;
use Closure;

class RenderWidget
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if (!method_exists($response, 'content')) :
            return $response;
        endif;

        $widgets = Widget::all();
        foreach ($widgets as $key => $value) {
            $content = str_replace($value->slug, $value->content, $response->content());
            foreach ($widgets as $value2) {
                $content = str_replace($value2->slug, $value2->content, $content);
                foreach ($widgets as $value3) {
                    $content = str_replace($value3->slug, $value3->content, $content);
                }
            }
            $response->setContent($content);
        }

        return $response;
    }
}
