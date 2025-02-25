<?php

namespace App\Http\Controllers\CMS;

use App\Models\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug){

        $page = Page::where('slug', $slug)->first();

        if($page){
           return view('cms.page',[
                'page' => $page
           ]);
        }else{
            abort(404);
        }
    }
}
