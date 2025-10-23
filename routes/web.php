<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostController;


Route::get("/", function() {
    return view("welcome");
});

//register
Route::get("/register", [RegisterUserController::class, "create"]);
Route::post("/register", [RegisterUserController::class, "store"]);

//session
Route::get("/login", [SessionController::class, "create"]);
Route::post("/login", [SessionController::class, "store"]);
Route::delete("/logout", [SessionController::class, "destroy"]);

Route::middleware(["auth", "role:1"])->group(function() {
    Route::get("/posts/create", [PostController::class, "create"]);
    Route::post("/posts", [PostController::class, "store"]);
    Route::get("posts/{post}/edit", [PostController::class, "edit"])->can("edit", "post");
    Route::patch("posts/{post}", [PostController::class, "update"]);
    Route::delete("/posts/{post}", [PostController::class, "destroy"]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
