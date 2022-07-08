@extends('layouts.app')

@section('content')
<section class="">
    <div class="container-fluid h-custom">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="{{ asset('assets/img/register.jpg') }}" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start ">
                    <h3 class="fw-bold mb-0 me-3">Register</h3>
                </div>
                <hr class="divider">
                <!-- Email input -->
                <div class="form-outline mb-2 mt-5">
                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name"  required placeholder="Nama Lengkap">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    <label class="form-label" for="name"></label>
                </div>
                
                <div class="form-outline mb-2">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required placeholder="Alamat Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    <label class="form-label" for="email"></label>
                </div>
                
                <div class="form-outline mb-2">
                    <select class="form-control" name="school_id" id="schoolId">
                        <option selected>Asal Sekolah</option>
                        @foreach ($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                    <label class="form-label" for="schoolId"></label>
                </div>
    
                <!-- Password input -->
                <div class="form-outline mb-2">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Kata Sandi">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label class="form-label" for="password"></label>
                </div>

                <div class="form-outline mb-2">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Kata Sandi">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label class="form-label" for="password-confirm"></label>
                </div>

                <div class="form-outline mb-2">
                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required placeholder="Kode Sekolah">
                        @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    <label class="form-label" for="code"></label>
                </div>
    
                <div class="text-center text-lg-start mt-2 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</section>
@endsection
