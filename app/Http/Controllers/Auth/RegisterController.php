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
use Illuminate\Support\Facades\Auth;
use Exception;
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
        print_r('text');
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
        return Validator::make($data->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users',],
            'password' => ['required', 'string','confirmed'],
        ]);
    }
    protected function create(Request $data)
    {
        //validarea campurilor formularului
        $data->validate([
            'first-name' => 'required|alpha',
            'last-name' => 'required|alpha',
            'dob' => 'date_format:Y-m-d|before:today',
            'email'=>'required|email|max:255|unique:users',
            'password'=> [
                'required',
                'string',
                'min:8',
                'regex:/[0-9]/',
                'regex:/[a-z]/',
            ],
        ]);
      try {
       //popularea tabelelor aferente cu datele userului

          $user= User::create([
              'email' => $data['email'],
              'password' => Hash::make($data['password']),
              'isAdmin'=> 0,

          ]);

     $people=Person::create([
         'nume'=>$data['first-name'],
         'prenume'=>$data['last-name'],
         'data_nasterii'=>$data['dob'],
         'judetID'=>$data['county']
     ]);


       $people->user()->save($user);

       return view('/succesRegistration');

     }catch(Exception $e){
          return back()->with('error', 'Contul este deja existent');
      }

     }
}
