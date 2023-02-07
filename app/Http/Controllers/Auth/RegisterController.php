<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('user');
        return $user;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required|max:100',
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users,email'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['roles'] = 'user';
        $input['departement_id'] = 1;
        $id = User::role($input['roles'])->count()+1;
        $regNumber = str_replace("-", "", "01" . "." . date('m-Y', time())) . "." . sprintf("%'.04s", $id);
        $current_date = \Carbon\Carbon::now()->toDateTimeString();
        $input['registration_number'] = $regNumber;
        $input['date_of_entry'] = $current_date;

        $user = User::create($input);
        $user->assignRole('user');

        toast()->success('User created successfully');
        return redirect()->route('login');
    }
}
