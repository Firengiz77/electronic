<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function all_admin(){
        $admins = User::where('superadmin','1')->orWhere('superadmin','2')->get();
        return view('admin.user.all_admin',compact('admins'));
    }
   public function index(){
    return view('admin.user.dashboard');
   }
   public function account(){
      return view('admin.user.account');
     }


}
