<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struktur;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Struktur::get();

        return view('pages.backend.strukturpengurus.index', [
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
        return view('pages.backend.strukturpengurus.create');
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
            'nama' => 'required',
            'jabatan' => 'required',
            'angkatan' => 'required|max:14',
        ]);

        $input = $request->all();
        $struktur = Struktur::create($input);
        return redirect()->route('struktur-pengurus.index');
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
        $item = Struktur::findOrFail($id);

        return view('pages.backend.strukturpengurus.edit', [
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
            'nama' => 'required',
            'jabatan' => 'required',
            'angkatan' => 'required|max:14',
        ]);

        $struktur = Struktur::find($id)->update($request->all());

        return redirect()->route('struktur-pengurus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Struktur::findOrFail($id);
        $item->delete();

        return redirect()->route('struktur-pengurus.index');
    }
}
