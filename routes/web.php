<?php

use App\Http\Controllers\PeraturanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Banner;

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
    $banners = Banner::latest()->get();
    return view("index", compact("banners"));
});

Route::get("/about", function () {
    return view("about");
});

// tampilkan halaman login
Route::get("/login", [AuthController::class, "showLogin"])->name("login");

// proses login
Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"])->name("register");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");

Route::middleware(["auth", "role:admin"])->group(function () {
    Route::get("/admin", fn() => view("admin.index"));
    Route::resource(
        "/admin/banner",
        \App\Http\Controllers\BannerController::class,
    )->only(["index", "store", "destroy"]);
    Route::resource(
        "/admin/video",
        \App\Http\Controllers\VideoController::class,
    )->only(["index", "store", "destroy"]);
    Route::resource(
        "/admin/sop",
        \App\Http\Controllers\SopController::class,
    )->only(["index", "store", "destroy"]);
    Route::resource("/admin/peraturan", PeraturanController::class)->only([
        "index",
        "store",
        "destroy",
    ]);
});

Route::middleware(["auth", "role:pegawai"])->group(function () {
    Route::get("/pegawai", fn() => view("pegawai.index"));
});

Route::middleware(["auth", "role:psikolog"])->group(function () {
    Route::get("/psikolog", fn() => view("psikolog.index"));
});
