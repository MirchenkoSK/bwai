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
        $this->canLogin = Route::has('login');
        $this->canRegister = Route::has('register');
        $this->laravelVersion = Application::VERSION;
        $this->phpVersion = PHP_VERSION;
        $this->pages = Page::all();

        $this->template .= 'Index';
        return $this->fire();
    }
}
