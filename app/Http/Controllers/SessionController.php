<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function getCartCount(){
        $userExist = Auth::user();

        if ($userExist){
            $cart = Cart::where('user_id', $userExist->id)->sum('qty');
            return $cart;
        } else {
            $cart = Cart::whereNull('user_id')->sum('qty');
            return $cart;
        }
        
    }

    //
    public function getRegisterPage(){
        return view('register', ['totalCart' => $this->getCartCount()]);
    }

    public function registerStore(Request $request){
        $data = $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('loginPage');
    }

    public function getloginPage(){
        return view('login', ['totalCart' => $this->getCartCount()]);
    }

    public function loginStore(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();

            return redirect()->route('shoppingPage');
        } else {
            return back()->with('error', 'Email/Password salah.');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('shoppingPage');
    }
}
