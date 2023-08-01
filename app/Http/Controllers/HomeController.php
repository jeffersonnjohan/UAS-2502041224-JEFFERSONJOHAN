<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function register(){
        $price = mt_rand(100000,125000);
        return view('authentication.register', [
            'price' => $price
        ]);
    }
    public function login(){
        return view('authentication.login');
    }

    public function index(){
        $user = User::find(Auth::user()->id);
        
        if(count($user->likes) > 0){
            $excludedIds = $user->likes->pluck('receiver_id');
            $users = User::whereNot('id', Auth::user()->id)
            ->whereNotIn('id', $excludedIds)->where('is_visible', 1)->get();
        } else{
            $users = User::whereNot('id', Auth::user()->id)->where('is_visible', 1)->get();
        }
        return view('home', [
            'users' => $users,
        ]);
    }

    public function like($id){
        Like::create([
            'user_id' => Auth::user()->id,
            'receiver_id' => $id
        ]);
        return redirect('/home');
    }


}
