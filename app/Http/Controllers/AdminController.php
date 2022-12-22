<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function index()
    {
        $items = User::get();

        return view('pages.backend.admin.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'password_konfirmasi' => 'confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->foto = $image_name;
        $user->save();
        return redirect()->route('admin.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.backend.admin.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'password_konfirmasi' => 'confirmed',
        ]);

        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password))
            $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.index');
    }


    public function profil()
    {
        $item = User::findOrFail(auth()->user()->id);

        return view('pages.backend.profile', [
            'item' => $item
        ]);
    }

    public function profilUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'password_konfirmasi' => 'confirmed',
        ]);

        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password))
            $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->route('profil');
    }

}
