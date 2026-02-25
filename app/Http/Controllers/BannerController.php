<?php
namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $datas = Banner::latest()->paginate(5);
        return view("admin.banner.index", compact("datas"));
    }
}
