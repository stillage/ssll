<?php

namespace App\Http\Controllers;

use App\Models\bobot;
use App\Models\kategori;
use App\Models\pertanyaan;
use App\Models\sekolah;
use App\Models\survei;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $s = sekolah::whereNull('hasil')->get()->count();
        if($s > 0){
            $users = User::role('user')->get();
        $school = sekolah::where('hasil', '')
            ->orWhere('hasil', null)
            ->get();
        $bobot4 = bobot::where('id', 1)->first();
        $bobot3 = bobot::where('id', 2)->first();
        $bobot2 = bobot::where('id', 3)->first();
        $bobot1 = bobot::where('id', 4)->first();
        $pertanyaan = pertanyaan::orderBy('id', 'asc')->get();
        $kategori_count = kategori::count();
        return view('survey.create', compact(
            'users',
            'school',
            'pertanyaan',
            'kategori_count',
            'bobot1',
            'bobot2',
            'bobot3',
            'bobot4'
        ));
        }
        elseif($s == 0) {
        toast()->success('semua sekolah telah melakukan survey mohon tambahkan data sekolah baru');
        return redirect()->route('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sekolah' => 'required',
            'by' => 'required',
            'answer' => 'required'
        ]);

        $sum = 0;
        foreach ($request->answer as $jaw) {
            $sum += $jaw;
        }

        $bobot1 = bobot::where('id', 1)->first()->batasan;
        $bobot2 = bobot::where('id', 2)->first()->batasan;
        $bobot3 = bobot::where('id', 3)->first()->batasan;
        $bobot4 = bobot::where('id', 4)->first()->batasan + 0.00001;

        if ($sum == $bobot4 || $sum < $bobot4) {
            survei::create([
                'sekolah' => $request->sekolah,
                'by' => $request->by,
                'hasil' => bobot::where('id', 4)->first()->hasil,
                'score' => $sum
            ]);
            $sekolah = sekolah::where('id', $request->sekolah)->first();
            $sekolah->update([
                'hasil' => bobot::where('id', 4)->first()->hasil
            ]);
            toast()->success($sekolah->nama . ' hasil Survey adalah ' . $sekolah->hasil);
            return redirect()->route('/');
        } elseif ($sum > $bobot4 && $sum <= $bobot3) {
            survei::create([
                'sekolah' => $request->sekolah,
                'by' => $request->by,
                'hasil' => bobot::where('id', 3)->first()->hasil,
                'score' => $sum
            ]);
            $sekolah = sekolah::where('id', $request->sekolah)->first();
            $sekolah->update([
                'hasil' => bobot::where('id', 3)->first()->hasil
            ]);
            toast()->success($sekolah->nama . ' hasil Survey adalah ' . $sekolah->hasil);
            return redirect()->route('/');
        } elseif ($sum > $bobot3 && $sum <= $bobot2) {
            survei::create([
                'sekolah' => $request->sekolah,
                'by' => $request->by,
                'hasil' => bobot::where('id', 2)->first()->hasil,
                'score' => $sum
            ]);
            $sekolah = sekolah::where('id', $request->sekolah)->first();
            $sekolah->update([
                'hasil' => bobot::where('id', 2)->first()->hasil
            ]);
            toast()->success($sekolah->nama . ' hasil Survey adalah ' . $sekolah->hasil);
            return redirect()->route('/');
        } elseif ($sum > $bobot2 && $sum <= $bobot1) {
            survei::create([
                'sekolah' => $request->sekolah,
                'by' => $request->by,
                'hasil' => bobot::where('id', 1)->first()->hasil,
                'score' => $sum
            ]);
            $sekolah = sekolah::where('id', $request->sekolah)->first();
            $sekolah->update([
                'hasil' => bobot::where('id', 1)->first()->hasil
            ]);
            toast()->success($sekolah->nama . ' hasil Survey adalah ' . $sekolah->hasil);
            return redirect()->route('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\survei  $survei
     * @return \Illuminate\Http\Response
     */
    public function show(survei $survei)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\survei  $survei
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = sekolah::find($id);
        $survey = survei::where('sekolah', $school->id)->first();
        $users = User::role('user')->get();
        $bobot4 = bobot::where('id', 1)->first();
        $bobot3 = bobot::where('id', 2)->first();
        $bobot2 = bobot::where('id', 3)->first();
        $bobot1 = bobot::where('id', 4)->first();
        $pertanyaan = pertanyaan::orderBy('id', 'asc')->get();
        $kategori_count = kategori::count();
        return view('survey.edit', compact(
            'users',
            'school',
            'pertanyaan',
            'kategori_count',
            'bobot1',
            'bobot2',
            'bobot3',
            'bobot4',
            'survey'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\survei  $survei
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'by' => 'required',
            'answer' => 'required'
        ]);

        $sum = 0;
        foreach ($request->answer as $jaw) {
            $sum += $jaw;
        }

        $bobot1 = bobot::where('id', 1)->first()->batasan;
        $bobot2 = bobot::where('id', 2)->first()->batasan;
        $bobot3 = bobot::where('id', 3)->first()->batasan;
        $bobot4 = bobot::where('id', 4)->first()->batasan + 0.00001;

        if ($sum == $bobot4 || $sum < $bobot4) {
            $survey = survei::find($id);
            $sekolah = sekolah::where('id', $survey->sekolah)->first();
            $survey->update([
                'sekolah' => $sekolah->id,
                'by' => $request->by,
                'hasil' => bobot::where('id', 4)->first()->hasil,
                'score' => $sum
            ]);
            $sekolah->update([
                'hasil' => bobot::where('id', 4)->first()->hasil
            ]);
            toast()->success($sekolah->nama . ' hasil Survey adalah ' . $sekolah->hasil);
            return redirect()->route('sekolahs.index');
        } elseif ($sum > $bobot4 && $sum <= $bobot3) {
            $survey = survei::find($id);
            $sekolah = sekolah::where('id', $survey->sekolah)->first();
            $survey->update([
                'sekolah' => $sekolah->id,
                'by' => $request->by,
                'hasil' => bobot::where('id', 3)->first()->hasil,
                'score' => $sum
            ]);
            $sekolah->update([
                'hasil' => bobot::where('id', 3)->first()->hasil
            ]);
            toast()->success($sekolah->nama . ' hasil Survey adalah ' . $sekolah->hasil);
            return redirect()->route('sekolahs.index');
        } elseif ($sum > $bobot3 && $sum <= $bobot2) {
            $survey = survei::find($id);
            $sekolah = sekolah::where('id', $survey->sekolah)->first();
            $survey->update([
                'sekolah' => $sekolah->id,
                'by' => $request->by,
                'hasil' => bobot::where('id', 2)->first()->hasil,
                'score' => $sum
            ]);
            $sekolah->update([
                'hasil' => bobot::where('id', 2)->first()->hasil
            ]);
            toast()->success($sekolah->nama . ' hasil Survey adalah ' . $sekolah->hasil);
            return redirect()->route('sekolahs.index');
        } elseif ($sum > $bobot2 && $sum <= $bobot1) {
            $survey = survei::find($id);
            $sekolah = sekolah::where('id', $survey->sekolah)->first();
            $survey->update([
                'sekolah' => $sekolah->id,
                'by' => $request->by,
                'hasil' => bobot::where('id', 1)->first()->hasil,
                'score' => $sum
            ]);
            $sekolah->update([
                'hasil' => bobot::where('id', 1)->first()->hasil
            ]);
            toast()->success($sekolah->nama . ' hasil Survey adalah ' . $sekolah->hasil);
            return redirect()->route('sekolahs.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\survei  $survei
     * @return \Illuminate\Http\Response
     */
    public function destroy(survei $survei)
    {
        //
    }
}
