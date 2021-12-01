@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <form action="/set-review" method="POST">
        @csrf
        <input type="text" name="login" placeholder="Enter login" @error('login') is-invalid @enderror>
        @error('login')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input type="text" name="content" placeholder="Enter content" @error('content') is-invalid @enderror>
        @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <button class="btn btn-primary">Send</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Login</th>
                <th>Content</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($review as $item)
                <tr>
                    <td>{{ $item->login }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ date('d.m.Y', strtotime($item->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
