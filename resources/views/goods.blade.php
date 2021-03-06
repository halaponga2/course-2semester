@extends('layouts.layout')

@section('content')

    <main>
        <h1>Товары</h1>
        <ul class="goods__types">
            <li style="padding-left:5px"><a href="/goods/filter?type=drinks">Напитки</a></li>
            <li style="padding-left:5px"><a href="/goods/filter?type=frozen">Полуфабрикаты</a></li>
            <li style="padding-left:5px"><a href="/goods/filter?type=seafood">Морепродукты</a></li>
            <li style="padding-left:5px"><a href="/goods/filter?type=bakery">Выпечка</a></li>
            <li style="padding-left:5px"><a href="/goods/filter?type=milks">Молочка</a></li>
        </ul>
        @foreach($goods as $good)
        <div class="d-inline-flex p-2">
            <div class="card" style="width: 18rem;">
                <img src="{{ Storage::url($good->image) }}" class="card-img-top img-thumbnail card__image" alt="card image">
                <div class="card-body">
                    <h5 class="card-title">{{$good->name}}</h5>
                    <p class="card-text">{{$good->description}} </p>
                    <p class="card-text">{{$good->price}} руб.</p>
                    <a href="/goods/{{$good->id}}" class="btn btn-primary">Подробнее </a>
                    <a href="/edit/{{$good->id}}" style="margin-left:100px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg></a>
                    <a href="/destroy/{{$good->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg></a>
                </div>
            </div>
        </div>
        @endforeach
    </main>

@endsection