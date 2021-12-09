@extends('layouts.layout')

@section('content')
    <main>
        <div class="row text-center">
            <div class="col">
                <div class="goods__card">
                <h1>{{$good->name}}</h1>
                <img src="{{ Storage::url($good->image) }}" class="card__image"  alt="card image">
                
                <p><b>Категория:</b>
                    @switch($good->type)
                        @case("drinks")
                            {{"Напитки"}}
                            @break
                        @case("frozen")
                            {{"Полуфабрикаты"}}
                            @break
                        @case("seafood")
                            {{"Морепродукты"}}
                            @break
                        @case("bakery")
                            {{"Выпечка"}}
                            @break
                        @case("milks")
                            {{"Молочка"}}    
                            @break    
                    @endswitch
                </p>
                <a href="../edit/{{$good->id}}" style="" class="btn btn-primary">Изменить</a>
                <a href="../destroy/{{$good->id}}" class="btn btn-primary">Удалить</a>
                </div>
            </div>
            <div class="goods__shops col">
                <p><b>Описание:</b> {{$good->description}}</p>
                <p><b>Производитель:</b> {{$good->manufacturer}}</p>
                <h5 >Доступность в магазинах:</h5>
                <ul class="shop-list">
                    @foreach ($good->shops as $shop)
                        <li class="shop-list__item <?php if($shop->pivot->available===1){echo('shop-list__item_active');}?>">{{$shop->name}}</li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
        @if (!$reviews->isEmpty())
        <h3>Отзывы</h3>
        @endif

            
        @foreach($good->reviews as $review)
        <div class="d-inline-flex p-2">
            
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    
                    <h5 class="card-title">{{$review->name}} </h5>
                    
                </div>
                <div class="card-body">
                    <p class="card-text">{{$review->comment}}</p>
                </div>
                <div class="card-footer">
                    <a href="reviews/destroy/{{$review->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg></a>
                </div>
            </div>
        </div>
        @endforeach
        <form  action="../goods/{{$good->id}}/reviews" method="post" class="col-md-5">
            @csrf 
            <h3>Добавить отзыв</h3>

            
            <div class="form-group">
                <label for="review-name">Введите имя</label>
                <input type="text" name="name" id="review-name" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="review-comment">Введите текст</label>
                <textarea name="comment" id="review-comment" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Отправить</button>
        </form>
    </div>
    </main> 
@endsection