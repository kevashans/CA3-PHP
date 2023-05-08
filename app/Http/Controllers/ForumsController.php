<?php  

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topics;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ForumsController extends Controller{
    public function index()
    {
        return view('forums.index')
            ->with('topics', Topics::orderBy('id', 'DESC')->get());
    }

}
