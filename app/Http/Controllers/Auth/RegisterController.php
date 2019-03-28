<?php

namespace App\Http\Controllers\Auth;

use App\Artist;
use App\City;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Image;

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
    protected $redirectTo = '/search';

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

        if($data['user_type'] == 'artist'){
            $validation = [
                'name' => ['required', 'string', 'max:50'],
                'surname' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:320', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
                'description' => ['required', 'string', 'max:500'],
                'street_number' => ['required', 'numeric'],
                'city' => ['required'],
                'street' => ['required'],
                'postcode' => ['required'],
                'avatar' => ['required', 'image']
            ];
        } else {
            $validation = [
                'name' => ['required', 'string', 'max:50'],
                'surname' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:320', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
                'description' => ['required', 'string', 'max:500'],
                'avatar' => ['required', 'image']
            ];
        }
        return Validator::make($data, $validation);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, $filename)
    {

        if($data['user_type'] == 'artist') {
            $user = User::create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'description' => $data['description'],
                'avatar' => $filename
            ]);

            $city = City::firstOrCreate([
                'city' => $data['city']
            ]);

            $artist = new Artist();
            $artist->street_number = $data['street_number'];
            $artist->street = $data['street'];
            $artist->postcode = $data['postcode'];
            $artist->user()->associate($user);
            $artist->city()->associate($city);
            $artist->save();

            return $user;

        } else {
            return User::create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'description' => $data['description'],
                'avatar' => $filename
            ]);
        }
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $avatar = $request->file('avatar');
        $filename = time().'.'.$avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

        event(new Registered($user = $this->create($request->all(), $filename)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: response()->json([ 'message' => 'Registered Complete!', 'url' => $this->redirectPath() ], 200);
    }

}
