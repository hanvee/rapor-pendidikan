@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sekolah</li>
      </ol>
    </nav>
    <h3>Data Sekolah</h3>
    {{-- Search --}}
    <form class="d-flex" action="{{ route('school.show') }}" action="GET" role="search">
      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-info" type="submit">Search</button>
    </form>
    @if(session()->has('message'))
      <div class="alert alert-success mt-4">
        {{ session()->get('message') }}
      </div>
    @endif
    @if ($schools->count())
    <div style="table-responsive">
        <table class="table table-hover table-bordered mt-4 table-striped">
          <tr class="table-dark">
            <th>No.</th>
            <th>Nama Sekolah</th>
            <th>Alamat</th>
            <th>Kecamatan</th>
            <th>Kab/Kota</th>
          </tr>
          @foreach ($schools as $school)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a class="text-reset text-decoration-none" href="{{ route('school.report.show', $school->id) }}">{{ $school->name }}</a></td>
            <td>{{ $school->address }}</td>
            <td>{{ $school->subdistrict->name }}</td>
            @if ($school->subdistrict && $school->subdistrict->city)
                <td>{{ $school->subdistrict->city->name }}</td>
            @endif
          </tr>
          @endforeach
        </table>  

        <div class="d-flex mb-3">
          <div class="me-auto p-2">
            {{ $schools->links() }}
          </div>
          <div class="p-2">
            <button type="button" class="btn btn-primary d-flex" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Tambah
            </button>
          </div>
        </div>


        <!-- Create School -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sekolah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('school.store') }}" method="POST">
                  @csrf
                  {{-- Nama  --}}
                  <label for="name">Nama Sekolah</label>
                  <input class="form-control mt-2 mb-3" type="text" name="name" id="name" placeholder="Nama Sekolah" required>

                  {{-- Alamat --}}
                  <label for="address">Alamat</label>
                  <select class="form-control mt-2 mb-2" name="subdistrict_id" required>
                    <option selected>Pilih Kecamatan</option>
                    @foreach ($subdistricts as $subdistrict)
                    <option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
                    @endforeach
                  </select>
                  <textarea class="form-control mb-4" name="address" rows="2" placeholder="Alamat Lengkap" required></textarea>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    @else 

    <div class="alert alert-danger mt-4">
        Data Tidak Tersedia
    </div>

    @endif
    
</div>
@endsection
