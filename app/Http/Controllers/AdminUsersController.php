<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
//        dd($request->all());
//        if (trim($request->password) == '')
//        {
//            $store = $request->except('password');
//        }
//        else
//        {
//            $store = $request->all();
//
//            $store['password'] = bcrypt($request->password);
//        }

        $store = $request->all();

        if ($file = $request->file('photo_id'))
        {
            $name = time() .$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $store['photo_id'] = $photo->id;
        }

        $store['password'] = bcrypt($request->password);

        User::create($store);

//        User::create($request->all());


        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
//        $user = User::findOrFail($id);
//
//        return "hello";
//        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);

//        return "hello";

        $role = Role::pluck('name', 'id')->all();
//
        return view('admin.users.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //

        $user = User::find($id);

//        dd($user);
//        return $user;

        if (trim($request->password) == '')
        {
            $input = $request->except('password');
        }
        else
        {
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }

        if ($file = $request->file('photo_id'))
        {
            $name = time() .$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);

        Session::flash('updated_user', 'User has been updated...');

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);

        unlink(public_path() . $user->photo->file);

        $user->delete();

        Session::flash('deleted_user', 'User has been deleted...');

        return redirect('admin/users');
    }
}
