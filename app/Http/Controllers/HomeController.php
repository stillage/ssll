<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Calendarific\Calendarific;
use App\Models\{
    bobot,
    User,
    Departement,
    kategori,
    pertanyaan,
    sekolah,
    survei
};
use Spatie\Permission\Models\Role;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $key = '7520f1fda4b1d04ee6691e97ced63acde95bb768';
        $country = 'ID';
        $year = date('Y', time());
        $month = date('m', time());
        $day = null;
        $location = null;
        $types = ['national'];
        $response = Calendarific::make($key, $country, $year, $month, $day, $location, $types);
        // $response["response"]["holidays"][$i]["description"]. " on ".$day.", ".$date."<br />";

        $kategori = kategori::count();
        $pertanyaan = pertanyaan::count();
        $sekolah = sekolah::count();
        $sekolahs = 
        $namasekolah = DB::table('sekolahs')->select('nama')->get();
        $score = sekolah::select('sekolahs.*','surveis.score')
                        ->join('surveis','surveis.sekolah','=','sekolahs.id')
                        ->get();
        $bobot = bobot::count();
        $users = User::count();
        $auth = auth()->user();
        $s = sekolah::where('hasil','=','Sekolah Sadar Lalu Lintas')->count();
        $c = sekolah::where('hasil','=','Sekolah Cukup Sadar Lalu Lintas')->count();
        $k = sekolah::where('hasil','=','Sekolah Kurang Sadar Lalu Lintas')->count();
        $t = sekolah::where('hasil','=','Sekolah Tidak Sadar Lalu Lintas')->count();
        $ko = sekolah::where('hasil','=','')->count();
        $checkProfil = $auth->date_of_birth == null || $auth->place_of_birth == null || $auth->gender == null || $auth->address == null || $auth->last_education == null || $auth->phone == null;

        if ($auth->hasRole('admin')) {
            return view('home', compact(
            'response','kategori','users','pertanyaan','sekolah','checkProfil','namasekolah','score','s','c','k','t','ko'
            ));

        } else if ($auth->hasRole('supervisor')){
            return view('home', compact(
            'response','users','bobot','checkProfil'
            ));

        } else if ($auth->hasRole('user')) {
            $survey = survei::where('by', $auth->id)->count();
            return view('home', compact(
            'response','survey','checkProfil'
            ));
        }
    }

    public function profile()
    {
        // $count = Task::where('user_id' ,'=', auth()->user()->id)->count();
        // $countO = Overtime::where('user_id' ,'=', auth()->user()->id)->count();
        // $countP = PaidLeave::where('user_id' ,'=', auth()->user()->id)->count();
        $user = User::find(auth()->user()->id);
        $roles = Role::all();
        $depart = Departement::all();
        $userRole = $user->roles->first();
        return view('profile',compact('user','roles','userRole','depart'));
    }

    public function profileupdate(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|max:255|min:5',
            'fullname' => 'required|max:255|min:8',
            'email' => 'required|email|unique:users,email,'.$id,
            'gender' => 'required',
            'last_education' => 'required',
            'nik' => 'required',
            'npwp' => 'required',
            'phone' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,svg|max:2048',
        ]);


        $user = User::find($id);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        if ($request->file('photo')) {
            File::delete('img/profile/' . $user->photo);
            $file = $request->file('photo');
            $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
            $destinationPath = public_path('img/profile');
            $imageFile = Image::make($file->getRealPath());
            $imageFile->resize(1200,1200)->save($destinationPath.'/'.$file_name);
            $input['photo'] = $file_name;
        }

        $user->update($input);

        toast()->success('Profile updated successfully');
        return redirect()->route('profile');
    }

    public function cleaner()
    {
        return view('cleaner');
    }

    public function viewclear()
    {
        Artisan::call('view:clear');
        toast()->success('View has cleared');
        return redirect('/cleaner');
    }

    public function routeclear()
    {
        Artisan::call('route:clear');
        toast()->success('Route has cleared');
        return redirect('/cleaner');
    }

    public function configclear()
    {
        Artisan::call('config:clear');
        toast()->success('Config has cleared');
        return redirect('/cleaner');
    }

    public function cacheclear()
    {
        Artisan::call('cache:clear');
        toast()->success('Cache has cleared');
        return redirect('/cleaner');
    }

    public function clearall()
    {
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        toast()->success('everything has cleared');
        return redirect('/cleaner');
    }
}
