<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display list video
     */
    public function index()
    {
        $datas = Video::latest()->paginate(5);
        return view("admin.video.index", compact("datas"));
    }

    /**
     * Store new video
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "judul" => "required|string|max:255",
            "url" => "required|url|max:255",
        ]);

        // Extra security: pastikan hanya domain YouTube
        if (!$this->isYoutubeUrl($validated["url"])) {
            return back()
                ->withErrors(["url" => "URL harus berasal dari YouTube"])
                ->withInput();
        }

        $videoId = $this->extractYoutubeId($validated["url"]);

        if (!$videoId) {
            return back()
                ->withErrors(["url" => "Format URL YouTube tidak valid"])
                ->withInput();
        }

        $embedUrl = "https://www.youtube.com/embed/" . $videoId;
        $thumbnail =
            "https://img.youtube.com/vi/" . $videoId . "/hqdefault.jpg";

        Video::create([
            "judul" => strip_tags($validated["judul"]), // sanitasi ekstra
            "url" => $embedUrl,
            "thumbnail" => $thumbnail,
        ]);

        return redirect()
            ->route("video.index")
            ->with("success", "Video berhasil ditambahkan");
    }

    /**
     * Delete video
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()
            ->route("video.index")
            ->with("success", "Video berhasil dihapus");
    }

    /**
     * Validasi domain YouTube
     */
    private function isYoutubeUrl($url)
    {
        $allowedHosts = [
            "youtube.com",
            "www.youtube.com",
            "youtu.be",
            "www.youtu.be",
        ];

        $host = parse_url($url, PHP_URL_HOST);

        return in_array($host, $allowedHosts);
    }

    /**
     * Extract YouTube ID
     */
    private function extractYoutubeId($url)
    {
        $patterns = [
            "/youtu\.be\/([^\?&]+)/",
            "/youtube\.com\/watch\?v=([^\?&]+)/",
            "/youtube\.com\/embed\/([^\?&]+)/",
            "/youtube\.com\/shorts\/([^\?&]+)/",
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }
}
