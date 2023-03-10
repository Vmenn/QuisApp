@extends('guru.body.app')
@section('main')
{{-- @if ($soal->isNotEmpty()) --}}
@php
    
    $soal = App\Models\Soal::where('quiz_id',$quiz->id)->paginate(1);
    // var_dump($quiz->id);

@endphp
{{-- <input type="hidden" name="id" value="{{ $category->id }}"> --}}
@foreach ($soal as $item)
    <div class="card">
        <div class="card-header">
            {{-- Soal {{$this->page}} --}}
            <div class="btn-group float-right">
                {{-- <button wire:click="hapus({{$item->id}})" class="btn btn-sm btn-danger ml-2">Hapus</button> --}}
                {{-- <a href="/soal/{{$item->id}}/edit" class="btn btn-sm btn-primary ml-2">Edit</a> --}}
                
            </div>
        </div>
        <div class="card-body">
            {{$item->soal}}
        </div>
    </div>
    <div class="card {{($item->jawaban == 'pilihan_a') ? 'border border-success' : ''}}">
        <div class="card-header">
            Pilihan A
        </div>
        <div class="card-body">
            {{$item->pilihan_a}}
        </div>
    </div>
    <div class="card {{($item->jawaban == 'pilihan_b') ? 'border border-success' : ''}}">
        <div class="card-header">
            Pilihan B
        </div>
        <div class="card-body">
            {{$item->pilihan_b}}
        </div>
    </div>
    <div class="card {{($item->jawaban == 'pilihan_c') ? 'border border-success' : ''}}">
        <div class="card-header">
            Pilihan C
        </div>
        <div class="card-body">
            {{$item->pilihan_c}}
        </div>
    </div>
    <div class="card {{($item->jawaban == 'pilihan_d') ? 'border border-success' : ''}}">
        <div class="card-header">
            Pilihan D
        </div>
        <div class="card-body">
            {{$item->pilihan_d}}
        </div>
    </div>
    <div class="card {{($item->jawaban == 'pilihan_e') ? 'border border-success' : ''}}">
        <div class="card-header">
            Pilihan E
        </div>
        <div class="card-body">
            {{$item->pilihan_e}}
        </div>
    </div>
@endforeach

{{$soal->links('pagination::bootstrap-5')}}
{{-- @else
<div class="alert alert-danger" role="alert">
Quiz tidak memiliki soal
</div>
@endif --}}
@endsection