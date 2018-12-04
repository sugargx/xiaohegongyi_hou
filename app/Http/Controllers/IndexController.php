<?php

namespace App\Http\Controllers;

use App\models\Menu;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('web');
    }
    public function layout()
    {
        $navs=Menu::all();
        return $navs;
    }
}
