<?php
use App\Models\user;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UserControlller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $role = auth()->user()->role;
        $userid = auth()->user()->id;
        $user = User::where('id', '=', $userid)->first();

        if ($role == 1) {
            return view('bendaharainti/user/profil', compact('user'));
        } elseif ($role == 2) {
            return view('bendaharabiro/user/profil', compact('user'));
        }
        
    }
}
