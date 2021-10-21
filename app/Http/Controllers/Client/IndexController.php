<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $this->template .= 'Index';
        return $this->fire();
    }
}
