@extends('layouts.first')

@section('first')    

<div class="bg-img">
    <div class="row justify-content-center">
        <div class="col-md-10 tengah">

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show kecil" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show kecil" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <main class="form-signin w-100 m-auto tengah">
                <form action="{{ route('login') }}" method="POST" class="container">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal d-block text-center">Login Disini</h1>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control 
                        @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" 
                        autocomplete="off" autofocus required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password" class="form-control 
                        @error('password') is-invalid @enderror" id="password" placeholder="Password" 
                        autocomplete="off" required>
                        <label for="password">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    <small class="d-block text-center">Don't Have Account? <a href="{{ route('register') }}">Register Here</a></small>
                </form>
            </main>
        </div>
    </div>
</div>
@endsection