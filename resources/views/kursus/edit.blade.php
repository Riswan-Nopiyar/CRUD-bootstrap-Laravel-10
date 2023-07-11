@extends('layouts.main')
@section('content')
<div class="container">

    <div class="card mt-4 mb-4 shadow" style="background-color: rgba(0,0,0, 0.01);">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Edit kursus</h2>
            <form action="{{ route('kursus.update', ['id' => $kursus->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $kursus->judul) }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $kursus->deskripsi) }}</textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="durasi_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="durasi_mulai" name="durasi_mulai" value="{{ old('durasi_mulai', $kursus->durasi_mulai) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="durasi_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="durasi_selesai" name="durasi_selesai" value="{{ old('durasi_selesai', $kursus->durasi_selesai) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="link_embed" class="form-label">Link embed materi</label>
                    <input type="text" class="form-control" id="link_embed" name="link_embed" value="{{ old('link_embed', $kursus->link_embed) }}" required>
                </div>

                <div class="mb-4">
                    <label for="foto_kursus" class="form-label">Foto Kursus <label class="text-danger">*upload ulang</label></label>
                    <input type="file" class="form-control" id="foto_kursus" name="foto_kursus" required>
                </div>

                <div class="text-center mb-2">
                    <a href="{{ url('/beranda')}}" class="btn btn-secondary me-5"> &#8592;</a>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection