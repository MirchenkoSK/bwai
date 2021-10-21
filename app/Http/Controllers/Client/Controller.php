<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Controller extends BaseController
{
    protected $template = 'Client/';
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
        return Inertia::render($this->template, $this->vars);
    }
}
