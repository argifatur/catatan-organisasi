<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\JadwalRapat;

class JadwalRapatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = JadwalRapat::where('user_id', Auth::user()->email)->get();

        return view('pages.backend.jadwalrapat.index', [
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
        return view('pages.backend.jadwalrapat.create');
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
            'judul_rapat' => 'required|max:42',
            'agenda_rapat' => 'required',
            'tanggal' => 'required|max:14',
            'tempat' => 'required|max:24',
            'waktu_mulai' => 'required|max:56',
            'waktu_selesai' => 'required|max:56',

        ]);

        $input = $request->all();

        $schedules = JadwalRapat::create($input);

        return redirect()->route('jadwal-rapat.index');
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
        $item = JadwalRapat::findOrFail($id);

        return view('pages.backend.jadwalrapat.edit', [
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
            'judul_rapat' => 'required|max:42',
            'agenda_rapat' => 'required',
            'tanggal' => 'required|max:14',
            'tempat' => 'required|max:24',
            'waktu_mulai' => 'required|max:56',
            'waktu_selesai' => 'required|max:56',
        ]);

        $schedules = JadwalRapat::find($id)->update($request->all());

        return redirect()->route('jadwal-rapat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = JadwalRapat::findOrFail($id);
        $item->delete();

        return redirect()->route('jadwal-rapat.index');
    }
}
