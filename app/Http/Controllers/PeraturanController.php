<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeraturanController extends Controller
{
    /**
     * Tampilkan data peraturan
     */
    public function index()
    {
        $datas = Peraturan::latest()->paginate(5);
        return view("admin.peraturan.index", compact("datas"));
    }

    /**
     * Simpan peraturan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            "judul" => "required|string|max:255",
            "file" => "required|mimes:pdf|max:5120", // max 5MB
        ]);

        // simpan file
        $file = $request->file("file");
        $fileName = time() . "_" . $file->getClientOriginalName();
        $file->storeAs("public/peraturans", $fileName);

        // simpan ke database
        Peraturan::create([
            "judul" => $request->judul,
            "file" => $fileName,
        ]);

        return redirect()
            ->route("peraturan.index")
            ->with("success", "Peraturan berhasil ditambahkan.");
    }

    /**
     * Hapus peraturan
     */
    public function destroy($id)
    {
        $peraturan = Peraturan::findOrFail($id);

        // hapus file
        if (
            $peraturan->file &&
            Storage::exists("public/peraturans" . $peraturan->file)
        ) {
            Storage::delete("public/peraturans" . $peraturan->file);
        }

        // hapus data
        $peraturan->delete();

        return redirect()
            ->route("peraturan.index")
            ->with("success", "Peraturan berhasil dihapus.");
    }
}
