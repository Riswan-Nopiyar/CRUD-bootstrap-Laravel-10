@extends('layouts.main')
@section('content')


<div class="album py-5 bg-light">
  <div class="container">
    <div class="d-flex justify-content-center mb-5">
      <a href="{{ url('/tambah-kursus') }}" class="btn btn-primary">Tambah kursus</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-between flex-row">
      @foreach ($kursus as $kursus)
      <div class="col">
        <div class="card shadow-sm">
          <a href="{{ route('kursus.show', ['id' => $kursus->id]) }}">
            <img src="{{ asset('images/' . $kursus->foto_kursus) }}" class="bd-placeholder-img card-img-top" width="100%" height="225">
            <title>Placeholder</title>
            </img>
          </a>

          <div class="ms-4 me-4 card-title">
            <strong class="fs-3">{{ \Illuminate\Support\Str::limit($kursus->judul, 20) }}</strong>
          </div>
          <div class="card-body">
            <p class="card-text">{{ \Illuminate\Support\Str::limit($kursus->deskripsi, 140) }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{ route('kursus.edit', ['id' => $kursus->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('kursus.destroy', ['id' => $kursus->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-sm btn-danger" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                    </svg>
                  </button>
                </form>

              </div>
              <small class="text-muted">
                {{ \Carbon\Carbon::parse($kursus->durasi_mulai)->translatedFormat('d F Y') }} &#124;
                {{ \Carbon\Carbon::parse($kursus->durasi_selesai)->translatedFormat('d F Y') }}
              </small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<footer class="text-muted py-3 bg-primary">
    <div class="container">
        <p class="mb-1 text-white text-center">Riswan Nopiyar &copy; 2023</p>
    </div>
</footer>
@endsection