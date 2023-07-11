@extends('layouts.main')
@section('content')
<div class="container my-4">
    <div class="card shadow" style="background-color: rgba(0,0,0, 0.01);">
        <div class="card-body">
            <h2 class="text-center mb-5">Data Kursus</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/'.$kursus->foto_kursus) }}" class="img-fluid" alt="Foto Kursus">
                </div>
                <div class="col-md-6 fs-4">
                   
                    <p> <strong>Judul :</strong> {{ old('judul', $kursus->judul) }}</p>
                    
                    <p class=""><strong>Durasi :</strong> {{ $kursus->durasi_mulai }}</p>
                    <p class="" ><strong>Sampai :</strong> {{$kursus->durasi_selesai }}</p>
                    
                    <p><strong>Deskripsi : </strong>{{ $kursus->deskripsi }}</p>
               
                    <strong>Link Materi :</strong>
                    <a href="{{ $kursus->link_embed }}">{{ $kursus->link_embed }}</a>
                </div>
                <div class="col-md-12">
                <a href="{{ url('/beranda')}}" class="btn btn-secondary mx-5"> Kembali</a>
                </div>
            </div>
              
        </div>
    </div>
</div>
@endsection
