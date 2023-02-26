<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Soal;
use Illuminate\Http\Request;

class QuisController extends Controller


{

    public function home()
    {
        $quiz = Quiz::where('guru_id', auth()->id())->paginate(10);
        return view('guru.quiz.index', compact('quiz',));
    }

    public function store(Request $request)
    {
        // $this->validate();

        $quiz = Quiz::create([
            'nama' => $request->nama,
            'guru_id' => auth()->id(),
            'status' => '1'
        ]);
        // dd($quiz);
        // $this->format();

        // session(['quiz_id' => $quiz->id]);
        // redirect()->route('soal.index');

        return redirect()->back();
    }

    public function lihat_soal($id)
    {
        $quiz = Quiz::findorfail($id);

        return view('guru.soal.index', compact('quiz'));
    }
}
