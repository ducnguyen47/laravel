<?php
namespace Modules\Post\Http\Controllers\Web;

use Modules\Post\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        echo "Hello";   
    }
}
