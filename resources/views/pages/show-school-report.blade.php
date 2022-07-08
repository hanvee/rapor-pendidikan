@extends('layouts.app')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('school.show') }}">Sekolah</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lihat Laporan</li>
      </ol>
    </nav>
    <h3>Lihat Laporan</h3>
    <a class="btn btn-primary mt-2" href="{{ route('report.create') }}">Tambah</a>
    @if ($reports->count())
    <div class="table-responsive text-center">
        <table class="table table-bordered table-striped mt-4" style="width: 300%">
          <tr class="table-dark">
            <th style="width:3%">No.</th>
            <th style="width:5%">Nomor Indikator</th>
            <th style="width:15%">Nama Indikator</th>
            <th style="width:5%">Nilai Sekolah Anda</th>
            <th style="width:8%">Capaian</th>
            <th style="width:5%">Satuan Pendidikan Serupa di Nasional</th>
            <th style="width:5%">Nilai Rata-Rata Kab/Kota</th>
            <th style="width:5%">Nilai Rata-Rata Provinsi</th>
            <th style="width:5%">Nilai Rata-Rata Nasional</th>
            <th style="width:3%">Rentang Nilai</th>
            <th>Definsi Indikator</th>
            <th>Definsi Capaian</th>
            <th style="width:5%">Waktu Pengkinian</th>
            <th style="width:5%">Level</th>
            <th style="width:5%">Aksi</th>
          </tr>
          @foreach ($reports as $report)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $report->indicator_number }}</td>
            <td>{{ $report->indicator_name }}</td>
            <td>{{ $report->score }}</td>
            <td>{{ $report->achievement_point }}</td>
            <td>{{ $report->similar_national }}</td>
            <td>{{ $report->average_city }}</td>
            <td>{{ $report->average_province }}</td>
            <td>{{ $report->average_national }}</td>
            <td>{{ $report->score_range }}</td>
            <td>{{ $report->indicator_detail }}</td>
            <td>{{ $report->achievement_point_detail }}</td>
            <td>{{ date('M Y', strtotime($report->created_at)) }}</td>
            <td>{{ $report->level }}</td>
            
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('report.edit', $report->id) }}">Ubah</a>
                <form action="{{ route('report.destroy', $report->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah anda yakin menghapus data ini ?')">Hapus</button>
                </form>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $reports->links() }}
    </div>

    @else 
    <div class="alert alert-danger mt-4">
      Data Tidak Tersedia
    </div>
    @endif
</div>
@endsection
