<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $quiz_selesai = DB::table('quiz_murid')
            ->join('quiz', 'quiz_murid.quiz_id', '=', 'quiz.id')
            ->where('quiz_murid.murid_id', auth()->id())
            ->where('quiz_murid.status', '1')
            ->where('quiz.status', '1')
            ->select('quiz_murid.*', 'quiz.nama')
            ->count();

        $quiz_belum_selesai = DB::table('quiz_murid')
            ->join('quiz', 'quiz_murid.quiz_id', '=', 'quiz.id')
            ->where('quiz_murid.murid_id', auth()->id())
            ->where('quiz_murid.status', '0')
            ->where('quiz.status', '1')
            ->select('quiz_murid.*', 'quiz.nama')
            ->count();

        $quiz_terbaru = DB::table('quiz_murid')
            ->join('quiz', 'quiz_murid.quiz_id', '=', 'quiz.id')
            ->where('quiz_murid.murid_id', auth()->id())
            ->where('quiz.status', '1')
            ->select('quiz_murid.*', 'quiz.nama')
            ->limit(5)
            ->get();
        return view('murid.home', compact('quiz_terbaru', 'quiz_selesai', 'quiz_belum_selesai'));
    }
}
