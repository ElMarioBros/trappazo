<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Models\Member;
use App\Models\User;

class MembersController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('username','password');

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->route('my-profile');
        }else{
            return $credentials;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function store(Request $request)
    {

        $words = array('trapecio','patio','cuadrado','tutor','periodista','actor','cena','pancarta','suburbio','radio','prensa','redes','lobo','calle','camino','casa','padre','guitarra','cine','silencio','onda','estrella','avance','brillo','oficina','producto');

        $member = new User;

        $word = $words[rand(0,count($words)-1)];
        $number = rand(1000,9999);
        $pass = $word . $number;
        
        $user_n = explode(' ',$request['name']);
        $user_n = $user_n[0] . rand(100,999);

        $member->name = $request['name'];
        $member->username = $user_n;
        $member->temp_password = $pass;
        $member->password = bcrypt($pass);
        $member->phone = $request['phone'];
        $member->state = "unchanged";

        $member->save();

        return redirect()->route('add-member')->with("success","Usuario agregado con éxito.");
        
    }

    public function index()
    {
        $members = User::all();

        return view('admin-dashboard',['members'=>$members]);

    }

    public function view($id)
    {
        $user = User::find($id);

        return view('profile',["user" => $user]);
    }

}
