<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Facades\Image;

class IndexController extends Controller
{
    public function index()
    {

        // dd(Image::fire('FILE', 'page', 1, 'Abracadabra'));


        $this->template .= 'Index';
        return $this->fire();
    }
}
