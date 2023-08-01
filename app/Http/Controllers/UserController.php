<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hobby;
use App\Models\HobbyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'password' => 'required|min:3',
            'image' => 'required|image|file|max:2048',
            'phone' => 'required|numeric|unique:users',
            'is_male' => 'required',
            'hobby_1' => 'required',
            'hobby_2' => 'required',
            'hobby_3' => 'required',
            'price' => 'required',
            'payment' => 'required'
        ]);

        if($validatedData['payment'] < $validatedData['price']){
            // Kekurangan bayar
            $underpaid = ($validatedData['payment']-$validatedData['price'])*-1;
            return redirect('/register')->with('error', "You are still underpaid
            $underpaid");
        }

        $validatedData['image'] = $request->file('image')->store('user-image');
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Calculate coin
        $coin = $validatedData['payment'] - $validatedData['price'];

        // Jika sudah selesai validasi
        $user = User::create([
            'name' => $validatedData['name'],
            'password' => $validatedData['password'],
            'image' => $validatedData['image'],
            'phone' => $validatedData['phone'],
            'is_male' => $validatedData['is_male'],
            'coin' => $coin
        ]);
        
        HobbyUser::create([
            'user_id' => $user->id,
            'hobby_id' => $validatedData['hobby_1']
        ]);
        HobbyUser::create([
            'user_id' => $user->id,
            'hobby_id' => $validatedData['hobby_2']
        ]);
        HobbyUser::create([
            'user_id' => $user->id,
            'hobby_id' => $validatedData['hobby_3']
        ]);
        return redirect('/login')->with('message', 'Your account has been created!');
    }

    public function login(){
        return view('authentication.login');
    }

    public function check_credential(Request $request){
        $credential = $request->validate([
            'password' => 'required',
            'phone' => 'required',
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect('/home');
        } else{
            // Login gagal
            return redirect('/login')->with('error', "Invalid Credentials");
        }
    }

    public function logout(){
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login');
    }

    public function liked(){
        $user = User::find(Auth::user()->id);
        $likedId = $user->likes->pluck('receiver_id');
        return view('liked', [
            'users' => User::whereIn('id', $likedId)->get(),
        ]);
    }
}
