@extends('notify-me-when-available::layout')
@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="w-50">
        <h2 class="text-center">Dashboard Login</h2>
        <form action="{{ route('dashboard.login') }}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Log In</button>
        </form>
    </div>
</div>
@endsection