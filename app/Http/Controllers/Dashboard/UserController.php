<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->authorizeResource(Page::class, 'page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->users = User::all();
        $this->template .= 'Users/Index';
        return $this->fire();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->pages = Page::all();
        // $this->page = new Page();
        // $this->template .= 'Pages/Create';
        // return $this->fire();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'string|required',
        //     'alias' => 'string|required',
        //     'title' => 'string|required',
        //     'subtitle' => 'string|nullable',
        //     'text' => 'string|required',
        //     'status' => 'boolean',
        //     'st' => 'string|nullable',
        //     'sd' => 'string|nullable',
        //     'ogt' => 'string|nullable',
        //     'ogd' => 'string|nullable',
        // ]);

        // $data = $request->all();
        // $data['seo_id'] = Seo::fire($data['seo']);
        
        // $page = new Page();
        // $page->fill($data);
        // if ($page->save()) {
        //     if ($request->hasFile('image')) {
        //         ImageBuilder::fire($request->image, 'page', $page->id, $page->name);
        //     }
        //     return redirect()->route('dashboard.page.show', $page->id)->with('message', 'Страница добавлена');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (!$user) {
            return redirect()->route('dashboard.user.index')->with('message', 'User not found');
        }
        $this->roles = Role::where('name', '!=', 'root')->get();
        $this->users = User::all();
        $this->user = $user;
        $this->template .= 'Users/Show';
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
        // if (!$page) {
        //     return redirect()->route('dashboard.page.index')->with('message', 'Page not found');
        // }
        // $request->validate([
        //     'name' => 'string|required',
        //     'alias' => 'string|required',
        //     'title' => 'string|required',
        //     'subtitle' => 'string|nullable',
        //     'text' => 'string|required',
        //     'status' => 'boolean',
        //     'st' => 'string|nullable',
        //     'sd' => 'string|nullable',
        //     'ogt' => 'string|nullable',
        //     'ogd' => 'string|nullable',
        // ]);

        // $data = $request->all();
        // $data['seo_id'] = Seo::fire($data['seo'], $page->seo_id);
        
        // $page->fill($data);
        // if ($page->save()) {
        //     if ($request->hasFile('image')) {
        //         ImageBuilder::fire($request->image, 'page', $page->id, $page->name);
        //     }
        //     return redirect()->route('dashboard.page.show', $page->id)->with('message', 'Страница обновлена');
        // }
    }

    /**
     * Update role from user.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function role(Request $request, User $user)
    {
        if (!$user) {
            return redirect()->route('dashboard.page.index')->with('message', 'User not found');
        }
        $data = $request->all();
        $user->role_id = $data['role']['id'];
        if ($user->save()) {
            return back()->with('message', 'Роль пользователя обновлена');
        }
        return back()->with('message', 'Упс... Кажется что-то пошло не так');
    }

    /**
     * Add ballance from user.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function ballance(Request $request, User $user)
    {
        if (!$user) {
            return redirect()->route('dashboard.page.index')->with('message', 'User not found');
        }
        $data = $request->all();
        $user->ballance = $user->ballance + ($data['num'] * 100);
        if ($user->save()) {
            return back()->with('message', 'Балланс пополнен на '.$data['num']);
        }
        return back()->with('message', 'Упс... Кажется что-то пошло не так');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        // if (!$page) {
        //     return redirect()->route('dashboard.page.index')->with('message', 'Page not found');
        // }
        // if ($page->delete()) {
        //     return redirect()->route('dashboard.page.index')->with('message', 'Страница удалена');
        // }
        // return redirect()->route('dashboard.page.index')->with('message', 'Упс... Кажется что-то пошло не так');
    }
}
