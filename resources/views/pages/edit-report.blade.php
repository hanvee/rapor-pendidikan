@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Beranda</a></li>
                    @role('master_admin')
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('school.show') }}">Sekolah</a></li>
                    @endrole
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('report.show') }}">Lihat Laporan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-10 mb-3">
                <h4>Ubah Data</h4>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form class="" method="POST" action="{{ route('report.update', $report->id) }}">
                            @csrf

                            @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="indicator_number" class="mb-2">{{ __('Nomor Indikator') }}</label>
                                            <input type="text" name="indicator_number" id="indicator_number" class="form-control" value="{{ $report->indicator_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="indicator_name"  class="mb-2">{{ __('Nama Indikator') }}</label>
                                            <input type="text" name="indicator_name" id="indicator_name" class="form-control" value="{{ $report->indicator_name }}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-2">
                                    <label for="indicator_detail" class="mb-2">{{ __('Definisi Indikator') }}</label>
                                    <input type="text" name="indicator_detail" id="indicator_detail" class="form-control" value="{{ $report->indicator_detail }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="achievement_point" class="mb-2">{{ __('Capaian') }}</label>
                                            <input type="text" name="achievement_point" id="achievement_point" class="form-control" value="{{ $report->achievement_point }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="achievement_point_detail"  class="mb-2">{{ __('Definisi Caoaian') }}</label>
                                            <input type="text" name="achievement_point_detail" id="achievement_point_detail" class="form-control" value="{{ $report->achievement_point_detail }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="score" class="mb-2">{{ __('Nilai') }}</label>
                                            <input type="number" name="score" id="score" class="form-control" value="{{ $report->score }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="score_range"  class="mb-2">{{ __('Rentang Nilai') }}</label>
                                            <input type="number" name="score_range" id="score_range" class="form-control" value="{{ $report->score_range }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="similar_national" class="mb-2">{{ __('Satuan Pendidikan Serupa di Nasional') }}</label>
                                    <input type="number" name="similar_national" id="similar_national" class="form-control" value="{{ $report->similar_national }}">
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="average_city" class="mb-2">{{ __('Rata-Rata Kab/Kota') }}</label>
                                            <input type="number" name="average_city" id="average_city" class="form-control" value="{{ $report->average_city }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="average_province"  class="mb-2">{{ __('Rata-Rata Provinsi') }}</label>
                                            <input type="number" name="average_province" id="average_province" class="form-control" value="{{ $report->average_province }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="average_national"  class="mb-2">{{ __('Rata-Rata Nasional') }}</label>
                                            <input type="number" name="average_national" id="average_national" class="form-control" value="{{ $report->average_national }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="level"  class="mb-2">{{ __('Level') }}</label>
                                            <input type="number" name="level" id="level" class="form-control" value="{{ $report->level }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="created_at"  class="mb-2">{{ __('Waktu Pengkinian') }}</label>
                                            <input type="date" name="created_at" id="created_at" class="form-control" value="{{ date('M Y', strtotime($report->created_at)) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button class="btn btn-primary w-100" name="submit">Submit</button>
                                     </div>

                                </div>  
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection