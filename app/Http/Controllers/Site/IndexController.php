<?php

namespace App\Http\Controllers\Site;

use App\Models\Page;
use App\Http\Controllers\Site\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class IndexController extends Controller
{
    public function index()
    {
        $this->pages = Page::all();
        $this->template .= 'Index';
        return $this->fire();
    }

    public function page($alias)
    {
        $this->pages = Page::all();
        $this->page = Page::where('alias', $alias)->first();
        $this->template .= 'Page';
        return $this->fire();
    }
}
