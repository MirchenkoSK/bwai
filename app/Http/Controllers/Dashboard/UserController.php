<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
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
        $this->template .= 'user/index';
        return $this->fire();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->template .= 'user/create';
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 5,
        ]);
        
        return redirect()->route('dashboard.user.show', $user->id)->with('message', 'User created');
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
        $this->user = $user;
        $this->template .= 'user/show';
        return $this->fire();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!$user) {
            return redirect()->route('dashboard.user.index')->with('message', 'User not found');
        }
        $this->roles = Role::where('name', '!=', 'root')->get();
        $this->user = $user;
        $this->template .= 'user/edit';
        return $this->fire();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (!$user) {
            return redirect()->route('dashboard.user.index')->with('message', 'User not found');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->fill($request->all());
        $user->save();
        
        return redirect()->route('dashboard.user.show', $user->id)->with('message', 'User updated');
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
            return redirect()->route('dashboard.user.index')->with('message', 'User not found');
        }
        $data = $request->all();
        $user->role_id = $data['role'];
        if ($user->save()) {
            return back()->with('message', 'Роль пользователя обновлена');
        }
        return back()->with('message', 'Упс... Кажется что-то пошло не так');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!$user) {
            return redirect()->route('dashboard.user.index')->with('message', 'User not found');
        }
        if ($user->delete()) {
            return redirect()->route('dashboard.user.index')->with('message', 'Пользователь удален');
        }
        return redirect()->route('dashboard.user.index')->with('message', 'Упс... Кажется что-то пошло не так');
    }
}
