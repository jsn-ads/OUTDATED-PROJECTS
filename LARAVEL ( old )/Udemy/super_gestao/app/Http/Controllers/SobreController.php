<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class SobreController extends Controller
{

    public function index()
    {

        return view('site.sobre.index');

    }
}
