<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $murid = User::role('murid')->count();
        $quiz = Quiz::where('guru_id', auth()->id())->count();

        $quiz_terbaru = Quiz::where('guru_id', auth()->id())->limit(5)->latest()->get();
        // $murid_terbaru = User::role('murid')->limit(5)->latest()->get();
        return view('guru.index', compact('quiz', 'quiz_terbaru',));
    }
}
