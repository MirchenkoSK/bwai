<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Facades\ImageBuilder;
use App\Facades\Seo;

class PageController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Page::class, 'page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->pages = Page::all();
        // dd($this->pages);
        $this->template .= 'Pages/Index';
        return $this->fire();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->pages = Page::all();
        $this->page = new Page();
        $this->template .= 'Pages/Show';
        return $this->fire();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        if (!$page) {
            return redirect()->route('dashboard.page.index')->with('message', 'Page not found.');
        }
        // dd(\App\Models\Image::all());
        // dd($page->image->original);
        $this->pages = Page::all();
        $this->page = $page;
        $this->template .= 'Pages/Show';
        return $this->fire();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        if (!$page) {
            return redirect()->route('dashboard.page.index')->with('message', 'Page not found.');
        }
        $request->validate([
            'name' => 'string|required',
            'alias' => 'string|required',
            'title' => 'string|required',
            'subtitle' => 'string|nullable',
            'text' => 'string|required',
        ]);

        $data = $request->all();
        $data['status'] = isset($data['status']) ? 1 : 0;
        $data['seo_id'] = Seo::fire($data['seo'], $page->seo_id);
        
        $page->fill($data);
        if ($page->save()) {
            if ($request->hasFile('image')) {
                ImageBuilder::fire($request->image, 'page', $page->id, $page->name);
            }
            return redirect()->route('dashboard.page.show', $page->id)->with('message', 'Страница обновлена.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
