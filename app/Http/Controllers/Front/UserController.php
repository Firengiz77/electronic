<?php

namespace App\Http\Controllers\Front;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $contact = Contact::first();
        \View::share('contact', $contact);
       
    }

    public function user_update(Request $request){
        $id = auth()->id();
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        return redirect()->back()->with('message', 'User Setting Has Been Changed Already');
    }

    public function update_image(Request $request){
        $id = auth()->id();
        $data = User::find($id);
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('/upload/admin_images/') . $data->image);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/upload/admin_images'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->back()->with('message', 'Images Changed Already');
    }
    
    public function user_password(Request $request)
    {

        $id = auth()->id();

        $hashedpassword = User::find($id)->password;

        if (Hash::check($request->old_password, $hashedpassword)) {
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect('login')->with('message', 'Password has been changed Successfully');
        } else {
            return redirect()->back()->with('message', 'Password has NOT been changed Successfully');
        }
    }


    public function dashboard(){
        return view('user.dashboard');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect("dashboard")->with('message', 'Successfully Signed In');
        }

        return redirect()->back()->with('message', 'Have A Problem,Please Check Again');

    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'admin_status' => '3',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin_status' => 3,
            'superadmin'=>$request->superadmin,
          ]);


        return redirect()->back()->with('message', 'Successfully Created User');
    }

    public function login_index(){
        return view('user.login');
    }

    public function index(){
        return view('user.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('user/login');
    }



}
