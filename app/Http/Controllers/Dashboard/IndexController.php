<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // dd(translations(resource_path('lang/'. app()->getLocale() .'.json')));
        $this->template .= 'dashboard/index';
        return $this->fire();
    }
}
