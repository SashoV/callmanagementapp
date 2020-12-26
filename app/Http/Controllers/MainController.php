<?php

namespace App\Http\Controllers;

use App\Call;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $calls = Call::where('duration', '>', 10)->paginate(25);
        return view('welcome', ['calls' => $calls]);
    }

}
