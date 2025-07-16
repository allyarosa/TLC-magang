<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    // public function index()
    // {
    //     $levels = Level::where('id', '!=', 4)->get();
    //     $latestNews = News::latest()->take(6)->get();

    //     // Kirim data ke view welcome
    //     return view('welcome', compact('latestNews', 'levels'));
    // }

    public function index()
    {
        $levelA = Level::where('level_name', 'A')->value('price');
        $levelB = Level::where('level_name', 'B')->value('price');
        $levelC = Level::where('level_name', 'C')->value('price');

        $latestNews = News::latest()->take(6)->get();

        return view('welcome', compact('latestNews', 'levelA', 'levelB', 'levelC'));
    }


        public function show($slug)
    {
        // Cari berita berdasarkan ID
        $news = News::where('slug',$slug)->firstorFail();

        // Tampilkan view detail berita
        return view('newsDetail', compact('news'));
    }
}
