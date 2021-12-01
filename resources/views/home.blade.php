@extends('layouts.app')


@section('content')
    <h1>{{$title}}</h1>
    <h2>{!! $header !!}</h2>

    <ol>
        @foreach ($contacts as $contact)
            <li><a href="/contact/{{$contact->id}}">{{ $contact->login }}</a></li> 
        @endforeach
    </ol>

    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @forelse ($users as $user)
        <p>{{$loop->iteration}}  {{$user}}</p>
    @empty
        <p>Empty</p>
    @endforelse

@endsection

@section('title')
    {{$title}};
@endsection