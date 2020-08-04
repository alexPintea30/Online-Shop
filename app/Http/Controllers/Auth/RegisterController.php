<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Person;
use App\Providers\RouteServiceProvider;
use App\Region;
use App\User;
//use http\Env\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

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
    public function index(){
        return view('auth/register');
}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users',],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name' =>['required']
        ]);
    }
    protected function create(Request $data)
    {

        $people=Person::create([
          'nume'=>$data['first-name'],
          'prenume'=>$data['last-name'],
          'data_nasterii'=>$data['dob'],
          'judetID'=>$data['county']
             ]);


     $user= User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isAdmin'=> 0,

        ]);
      $people->user()->save($user);
         return $people;
    }
}
