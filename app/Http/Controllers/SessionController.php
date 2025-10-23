<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{
    //
    public function create() {
        //dd("create");
        return view("auth.login");
    }

    public function store() {
        //dd("stosre");
        $attributes = request()->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                "email" => "sorry, those credential do not match."
            ]);
        }

        return redirect("/");
    }

    public function destroy() {
        auth::logout();

        return redirect("/");
    }

}
