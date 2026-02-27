<?php

namespace App\Http\Controllers;

use App\Models\SOP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SopController extends Controller
{
    /**
     * Tampilkan daftar SOP
     */
    public function index()
    {
        $datas = SOP::latest()->paginate(5);
        return view("admin.sop.index", compact("datas"));
    }

    /**
     * Simpan SOP baru (PDF)
     */
    public function store(Request $request)
    {
        $request->validate([
            "judul" => "required|string|max:255",
            "file" => "required|mimes:pdf|max:5120", // max 5MB
        ]);

        $file = $request->file("file");
        $filename = time() . "_" . $file->getClientOriginalName();

        // simpan ke storage/app/public/sop
        $file->storeAs("sop", $filename, "public");

        SOP::create([
            "judul" => $request->judul,
            "file" => $filename,
        ]);

        return redirect()
            ->route("sop.index")
            ->with("success", "SOP berhasil ditambahkan");
    }

    /**
     * Hapus SOP + file PDF
     */
    public function destroy($id)
    {
        $sop = SOP::findOrFail($id);

        // hapus file PDF jika ada
        if (
            $sop->file &&
            Storage::disk("public")->exists("sop/" . $sop->file)
        ) {
            Storage::disk("public")->delete("sop/" . $sop->file);
        }

        $sop->delete();

        return redirect()->back()->with("success", "SOP berhasil dihapus");
    }
}
