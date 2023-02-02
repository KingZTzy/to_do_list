@extends('layouts.first')

@section('first')    
<div class="bg-img">   
    <div class="row justify-content-center">
        <div class="col-md-10 tengah">
            <main class="form-signin w-100 m-auto">
                    <form action="{{ route('tambahAkun') }}" method="POST" class="container">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal d-block text-center">Register Disini</h1>
                                
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control 
                            @error('name') is-invalid @enderror" id="name" placeholder="Name" 
                            autocomplete="off" required value="{{ old('name') }}">
                            <label for="name">Name</label>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input type="email" name="email" class="form-control 
                            @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" 
                            autocomplete="off" required value="{{ old('email') }}" >
                            <label for="email">Email Address</label>
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
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
                        <small class="d-block text-center">Already Have Account? <a href="{{ route('login') }}">Login Here</a></small>
                    </form>
            </main>
        </div>
    </div>
</div>
@endsection