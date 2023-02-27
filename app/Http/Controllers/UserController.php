<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = User::with('roles')->paginate(50);

        return view('users.index', compact('users'));
    }

    public function index()
    {
        $users = User::with('roles')->paginate(50);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('store', User::class);

        return view('users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request)
    {
        $request['password'] = Hash::make($request->input('password'));
        DB::beginTransaction();
        try {
            $user = User::create($request->only(['name', 'email', 'password']));
            $user->roles()->sync($request->get('roles'));
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit($id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     *  Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);

        if ($request->filled('password')) {
            $request->merge([
                'password' => Hash::make($request->input('password')),
            ]);
        }
        DB::beginTransaction();
        try {
            $user->update(array_filter($request->only(['name', 'email', 'password'])));
            $user->roles()->sync($request->get('roles'));
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        $user = User::find($id);
        $this->authorize('delete', $user);

        DB::beginTransaction();
        try {
            $user->roles()->detach();
            $user->delete();
            $user->history()->delete();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex;
        }
        return redirect()->route('users.index');
    }
}
