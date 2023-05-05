<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $user = auth()->guard('admin')->user();
        
        if ($user->type == 'admin') {
            return "Welcome admin, " . $user->name;
        }else if ($user->type == 'manager') {
            return "Welcome manager, " . $user->name;
        }else{
            return "Welcome user, " . $user->name;
        }

    }
}
