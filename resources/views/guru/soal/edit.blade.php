@extends('guru.body.app')
@section('main')
<form action="{{route('update.soal')}}" method="post" class="mb-3">

    @csrf
    <input type="hidden" name="id" value="{{ $quiz->id }}">
    @php
        // var_dump($quiz);
    @endphp
    <div class="form-group">
        <label for="soal">Soal</label>
        <textarea class="form-control" name="soal" id="soal">{{$soal->soal}}</textarea>
        @error('soal')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="row">
        
            <div class="form-group col-lg-6">
                <label for="pilihan_a">Pilihan A</label>
                <input class="form-control" name="pilihan_a" id="pilihan_a" value="{{$soal->pilihan_a}}">
                @error('pilihan_a')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-lg-6">
                <label for="pilihan_b">Pilihan B</label>
                <input class="form-control" name="pilihan_b" id="pilihan_b" value="{{$soal->pilihan_b}}">
                @error('pilihan_b')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-lg-6">
                <label for="pilihan_c">Pilihan C</label>
                <input class="form-control" name="pilihan_c" id="pilihan_c" value="{{$soal->pilihan_c}}">
                @error('pilihan_c')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-lg-6">
                <label for="pilihan_d">Pilihan D</label>
                <input class="form-control" name="pilihan_d" id="pilihan_d" value="{{$soal->pilihan_d}}">
                @error('pilihan_d')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-lg-6">
                <label for="pilihan_e">Pilihan E</label>
                <input class="form-control" name="pilihan_e" id="pilihan_e" value="{{$soal->pilihan_e}}">
                @error('pilihan_e')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    <div class="form-group">
        <label for="jawaban">Jawaban</label>
        <select class="form-control" id="jawaban" name="jawaban">
            <option {{$soal->jawaban? '' : 'selected disabled'}}>Pilihan Jawaban</option>
            <option {{$soal->jawaban == 'pilihan_a' ? 'selected' : ''}} value="pilihan_a">Pilihan A</option>
            <option {{$soal->jawaban == 'pilihan_b' ? 'selected' : ''}} value="pilihan_b">Pilihan B</option>
            <option {{$soal->jawaban == 'pilihan_c' ? 'selected' : ''}} value="pilihan_c">Pilihan C</option>
            <option {{$soal->jawaban== 'pilihan_d' ? 'selected' : ''}} value="pilihan_d">Pilihan D</option>
            <option {{$soal->jawaban == 'pilihan_e' ? 'selected' : ''}} value="pilihan_e">Pilihan E</option>
        </select>
        @error('jawaban')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection
