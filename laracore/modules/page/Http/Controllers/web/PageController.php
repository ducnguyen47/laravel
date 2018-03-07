<?php
namespace Modules\Page\Http\Controllers\Web;

use Modules\Page\Models\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        echo "Hello";   
    }
}
