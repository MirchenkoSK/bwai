<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $this->template .= 'dashboard/index';
        return $this->fire();
    }
}
