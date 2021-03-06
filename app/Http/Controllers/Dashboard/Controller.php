<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Controller extends BaseController
{
    protected $template = '';
    private $vars = [];

    public function __get($name)
    {
        return $this->vars[$name];
    }

    public function __set($name, $value)
    {
        $this->vars[$name] = $value;
    }

    protected function fire()
    {
        // dd([$this->template, $this->vars]);
        Inertia::setRootView('bwai');
        return Inertia::render($this->template, $this->vars);
    }
}
