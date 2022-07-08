@extends('layouts.app')

@section('content') 
<section id="header">
<div class="container">
    <div class="banner">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-content">
                    <h3 class="big-heading text-heading text-white">Selamat Datang di Rapor Pendidikan</h3>
                    <button class="btn btn-outline-light mt-3"><a class="text-decoration-none text-reset" href="{{ route('report.create') }}">Input Laporan</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section id="cities">
<div class="container mt-5">
    <div class="row mt-3">
            <div class="col-sm-6 col-lg-3">
                <div class="card card-1 mb-4 text-white">
                    <div class="card-body d-flex justify-content-center align-items-center cities-card">
                        <h3>Jakarta Barat</h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card card-2 mb-4 text-white">
                    <div class="card-body d-flex justify-content-center align-items-center cities-card">
                        <h3>Jakarta Utara</h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card card-3 mb-4 text-white">
                    <div class="card-body d-flex justify-content-center align-items-center cities-card">
                        <h3>Jakarta Pusat</h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card card-4 mb-4 text-white">
                    <div class="card-body d-flex justify-content-center align-items-center cities-card">
                        <h3>Jakarta Selatan</h3>
                    </div>
                </div>
            </div>
    </div>
</div>
</section>

<section id="features">
<div class="container mt-5">
    <h3 class="big-heading text-center">Lihat Laporan</h3>
    <hr class="divider-horizontal">
    <div class="row mt-4">
        <div class="col-md-6 features-image">
        </div>
        <div class="col-md-6">
            <div class="features-content mt-5">
                <h4>Rapor Pendidikan menampilkan data kualitas satuan pendidikan</h4>
                <p>Sebagai bentuk penyempurnaan dari Rapor Mutu, Rapor Pendidikan diharapkan bisa menjadi acuan untuk mengidentifikasi, merefleksi, dan membenahi kualitas pendidikan Indonesia secara menyeluruh.</p>
                @role('admin')
                <a class="btn btn-primary" href="{{ route('report.show') }}">Lihat Laporan</a>
                @endrole
                @role('master_admin')
                <a class="btn btn-primary" href="{{ route('school.show') }}">Lihat Laporan</a>
                @endrole
            </div>
            
        </div>
    </div>
</div>
</section>

@endsection