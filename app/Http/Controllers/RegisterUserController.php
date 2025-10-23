<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;


class RegisterUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("auth.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->request);
        
        $userRole = Role::where("name", "user")->firstOrFail();

        $userAttributes = $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => ["required", "email", "unique:users,email"],
            "password" => ["required", "confirmed", Password::min(6)]
        ]);

        //dd(array_merge($userAttributes, ["role_id" => $userRole->id]));

        $user = User::create(array_merge($userAttributes, ["role_id" => $userRole->id]));

        Auth::login($user);

        return redirect("/");
    }
}
