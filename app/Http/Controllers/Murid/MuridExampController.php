<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MuridExampController extends Controller
{
    public $search;
    public function index()
    {
        if ($this->search) {
            $quiz = DB::table('quiz_murid')
                ->join('quiz', 'quiz_murid.quiz_id', '=', 'quiz.id')
                ->where('murid_id', auth()->id())
                ->where('quiz.nama', 'like', '%' . $this->search . '%')
                ->where('quiz.status', '1')
                ->select('quiz.nama', 'quiz_murid.*')
                ->paginate(5);
        } else {
            $quiz = DB::table('quiz_murid')
                ->join('quiz', 'quiz_murid.quiz_id', '=', 'quiz.id')
                ->where('murid_id', auth()->id())
                ->where('quiz.status', '1')
                ->select('quiz.nama', 'quiz_murid.*')
                ->paginate(5);
        }
        return view('murid.quiz.index', compact('quiz'));
    }

    public function soal($id)
    {
        $cek = DB::table('quiz_murid')
            ->select('status')
            ->where('quiz_id', $id)
            ->where('murid_id', auth()->id())
            ->first();

        if ($cek->status == 0) {
            session(['quiz_id' => $id]);
            redirect('/soal/murid');
        } else {
            session()->flash('gagal', 'Quiz sudah pernah dikerjakan.');
            redirect('/quiz/murid');
        }
    }
}
