<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventDetail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function showRegistrationForm(Request $request)
    {
        // dd('Im here');
        // dd($request);
        // $events = Event::all(); // Fetch all events (adjust this query as per your application's needs)
        // dd($request->event_id);
        $event = Event::findOrFail($request->event_id);

        return view('auth.register', compact('event'));
    }





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
            // 'name' => ['required', 'string', 'max:255'],
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
// dd($data);
        // Create the user
        $user = User::create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'blood_type' => $data['blood_type'],
            // 'age' => $data['age'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'civil_status' => $data['civil_status'],
            'nationality' => $data['nationality'],
            'occupation' => $data['occupation'],
            'address' => $data['address'],
            'contact_info' => $data['contact_info'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Create the event detail for the user
        EventDetail::create([
            'eventID' => $data['eventID'], // Replace with actual event ID
            'userID' => $user->id, // Assign the user's ID
        ]);

        return $user;
    }
}
