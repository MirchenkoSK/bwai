<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class IndexController extends Controller
{
    public function index()
    {
        $this->template .= 'Index';
        return $this->fire();
    }
}
