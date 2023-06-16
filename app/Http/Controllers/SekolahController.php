<?php

namespace App\Http\Controllers;

use App\Models\bobot;
use Image;
use App\Models\sekolah;
use App\Models\survei;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:sekolah-list|sekolah-create|sekolah-edit|sekolah-delete', ['only' => ['index','store']]);
        $this->middleware('permission:sekolah-create', ['only' => ['create','store']]);
        $this->middleware('permission:sekolah-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:sekolah-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (auth()->user()->hasAnyRole('admin|supervisor')) {
            $sekolahs = sekolah::with('survei')->get();
            // dd($sekolahs);
            // $sekolahs = sekolah::all();
            $bobot1 = bobot::where('id', 1)->first();
            $bobot2 = bobot::where('id', 2)->first();
            $bobot3 = bobot::where('id', 3)->first();
            $bobot4 = bobot::where('id', 4)->first();
            return view('sekolah.index', compact(
                'sekolahs','bobot1','bobot2','bobot3','bobot4'
            ));
        } else if (auth()->user()->hasRole('user')) {
            $sekolahs = sekolah::with('survei')->get();
            $bobot1 = bobot::where('id', 1)->first();
            $bobot2 = bobot::where('id', 2)->first();
            $bobot3 = bobot::where('id', 3)->first();
            $bobot4 = bobot::where('id', 4)->first();
            return view('sekolah.index', compact(
                'sekolahs','bobot1','bobot2','bobot3','bobot4'
            ));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekolah.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,sekolah $sekolah )
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'alamat' => 'required'
        ]);

        $input = $request->all();
        // dd($input);
        if ($request->file('photo')) {
            File::delete('img/profile/' . $sekolah->photo);
            $file = $request->file('photo');
            $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
            $destinationPath = public_path('img/profile');
            $imageFile = Image::make($file->getRealPath());
            $imageFile->resize(1200,1200)->save($destinationPath.'/'.$file_name);
            $input['photo'] = $file_name;
        }
        $sekolah = sekolah::create($input);
        toast()->success('sekolah created successfully');
        return redirect()->route('sekolahs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sekolahs = sekolah::find($id);
        return view('sekolahs.show',compact('sekolahs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolah = sekolah::find($id);
        return view('sekolah.edit',compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'alamat' => 'required'
        ]);

        $sekolah = sekolah::find($id);
        $input = $request->all();
        if ($request->file('photo')) {
            File::delete('img/profile/' . $sekolah->photo);
            $file = $request->file('photo');
            $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
            $destinationPath = public_path('img/profile');
            $imageFile = Image::make($file->getRealPath());
            $imageFile->resize(1200,1200)->save($destinationPath.'/'.$file_name);
            $input['photo'] = $file_name;
        }
        $sekolah->update($input);
        toast()->success('sekolah updated successfully');
        return redirect()->route('sekolahs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sekolah = sekolah::find($id);
        $sekolah->delete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Success',
                    'message' => 'Your file has been moved to trash!'
                ));
    }
}
