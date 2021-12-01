@extends('layouts.app')

@section('content')
    <h1>Contact Page</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/get-contacts" method="POST">
        @csrf
        <input type="text" name="login" placeholder="Enter login" @error('login') is-invalid @enderror value="{{old('login')}}">
        @error('login')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input type="text" name="email" placeholder="Enter email" @error('email') is-invalid @enderror value="{{old('email')}}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <button class="btn btn-primary">Send</button>
    </form>
@endsection
