<?php

namespace App\Http\Controllers;

use App\Models\bobot;
use App\Models\pertanyaan;
use App\Models\survei;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bobots = bobot::all();
            return view('bobot.index', compact(
                'bobots'
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function show(bobot $bobot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bobots = bobot::find($id);
        $count = pertanyaan::count();
        $num = bobot::max('nilai');
        $max = $num * $count;
        return view('bobot.edit',compact('bobots','max'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jawaban' => 'required|max:225',
            'nilai' => 'required',
            'batasan' => 'required',
            'hasil' => 'required|max:225'
        ]);

        $bobot = bobot::find($id);
        $input = $request->all();
        $bobot->update($input);
        toast()->success('Bobot updated successfully');
        return redirect()->route('bobots.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function destroy(bobot $bobot)
    {
        //
    }
}
