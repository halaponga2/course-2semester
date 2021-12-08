@extends('layouts.layout')

@section('content')

    <main>
        <h1>О нас</h1>
        <h2>Наши магазины:</h2>
        <ul>
        @foreach ($shops as $shop)
            <li>{{$shop->name}} - {{$shop->location}}</li>
        @endforeach
        </ul>
    </main>

@endsection
