<?php

namespace App\Http\Controllers;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', 
            ['users' => User::whereNotIn('ID', [1])->orderBy('user_registered')->paginate(20),
            'types' => Type::all()]);


    }
}
