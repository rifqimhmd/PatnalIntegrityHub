<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * INDEX
     */
    public function index()
    {
        $datas = Banner::latest()->paginate(5);
        return view("admin.banner.index", compact("datas"));
    }

    /**
     * STORE (upload banner dari modal)
     */
    public function store(Request $request)
    {
        $request->validate([
            "image" => "required|image|mimes:jpg,jpeg,png|max:2048",
        ]);

        // simpan ke storage/app/public/banners
        $image = $request->file("image")->store("banners", "public");

        Banner::create([
            "image" => basename($image),
        ]);

        return redirect()
            ->route("banner.index")
            ->with("success", "Banner berhasil ditambahkan");
    }

    /**
     * DESTROY (hapus banner)
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // hapus file
        \Storage::disk("public")->delete("banners/" . $banner->image);

        // hapus database
        $banner->delete();

        return redirect()
            ->route("banner.index")
            ->with("success", "Banner berhasil dihapus");
    }
}
