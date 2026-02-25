<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
    return view("index");
});

Route::get("/about", function () {
    return view("about");
});

Route::post("/login", [AuthController::class, "login"])->name("login");
Route::post("/register", [AuthController::class, "register"])->name("register");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");

Route::middleware(["auth", "role:admin"])->group(function () {
    Route::get("/admin", fn() => view("admin.index"));
    Route::resource("/banner", \App\Http\Controllers\BannerController::class);
});

Route::middleware(["auth", "role:pegawai"])->group(function () {
    Route::get("/pegawai", fn() => view("pegawai.index"));
});

Route::middleware(["auth", "role:psikolog"])->group(function () {
    Route::get("/psikolog", fn() => view("psikolog.index"));
});
