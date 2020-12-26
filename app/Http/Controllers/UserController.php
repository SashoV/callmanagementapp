<?php

namespace App\Http\Controllers;

use App\Call;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = Call::all()->sortBy('user')->pluck('user')->unique();
        return view('users', ['users' => $users]);
    }

    public function show($user) 
    {
        $userValidCalls = Call::where('user', $user)->where('duration', '>', 10)->get();
        $validCallsNo = $userValidCalls->count();
        $userScore = Call::where('user', $user)->where('duration', '>', 10)->sum('external_call_score');
        $avUserScore = $userScore / $validCallsNo;

        $lastFiveCalls = $userValidCalls->sortByDesc('date')->take(5);

        return view('user', ['user' => $user, 'avUserScore' => $avUserScore, 'lastFiveCalls' => $lastFiveCalls]);
    }
}
