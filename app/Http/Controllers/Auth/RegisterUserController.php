<?php

// namespace App\Http\Controllers\Auth;

// use App\User;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Http\Request;

// class RegisterUserController extends Controller
// {
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

// /    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function store(Request $request)
    // {
        // $this->validate($request, [
        //     'name' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        //     'profile' => 'required|image|max:1999'
        // ]);

        // if($request->hasFile('profile')){
        //     $filenameWithExt = $request->file('profile')->getClientOriginalName();
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     $extension = $request->file('profile')->getClientOriginalName();
        //     $filenameToStore = $filename . '_' . time() . '_' . $extension;
        //     $path = $request->file('profile')->storeAs('public/pictures',$filenameToStore);
        // }

        // $bTask = new User;
        // $bTask->name =  $request->input('task_id');
        // $bTask->address = $request->input('task_id');
        // $bTask->email = $request->input('task_id');
        // $bTask->password =   $request->input(Hash::make('password'));
        // $bTask->profile = $filenameToStore;

        // Session::flash('sendMail','Send Mail');
        // $user->sendVerificationEmail();
        // return $user;
        
    // }
// }
