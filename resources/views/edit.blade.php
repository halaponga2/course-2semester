@extends('layouts.layout')

@section('content')

    <main>
        <h1>Изменить товар</h1>
        <form method="post" action="" class="col-md-4 col-sm-12" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Введите название товара</label>
                <input required id="name" name="name" type="text" class="form-control" value="{{$good->name}}">
            </div>
            <div class="form-group mt-3">
                <label for="name">Выберите изображение товара</label>
                <input type="file" name="image" id="image">
                @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="type">Выберите тип товара</label>
                <select id="type" name="type" class="form-select mt-3">
                    <option value="drinks" @if($good->type==='drinks'){{{'selected'}}}@endif>Напитки</option>
                    <option value="frozen" @if($good->type==='frozen'){{{'selected'}}}@endif>Полуфабрикаты</option>
                    <option value="seafood" @if($good->type==='seafood'){{{'selected'}}}@endif>Морепродукты</option>
                    <option value="bakery" @if($good->type==='bakery'){{{'selected'}}}@endif>Выпечка</option>
                    <option value="milks" @if($good->type==='milks'){{{'selected'}}}@endif>Молочка</option>
              </select>
            </div>
            <div class="form-group mt-3">
                <label for="manufacturer">Введите изготовителя</label>
                <input required id="manufacturer" name="manufacturer" type="text" class="form-control" value="{{$good->manufacturer}}">
            </div>
            <div class=" form-group mt-3">
                <label for="description" class="form-label">Введите описание</label>
                <textarea required class="form-control" id="description" rows="3" name="description">{{$good->description}}</textarea>
            </div> 
            <div class="form-group mt-3">
                <label for="price">Введите цену</label>
                <input required id="price" name="price" type="number" class="form-control" min="0" max="100000" value="{{$good->price}}">
            </div>
            <div class=" form-group mt-3">
                <p>В каких магазинах доступно?</p>
                @foreach ($good->shops as $shop)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="shops_{{$shop->id}}"  name="shops_{{$shop->id}}" @if($shop->pivot->available===1)checked @endif>
                    <label class="form-check-label" for="shops_{{$shop->id}}">
                    {{$shop->name}}
                    </label>
                </div> 
                @endforeach
                
            </div>
            <button type="submit" class="btn btn-primary mt-3">Отправить</button>
        </form>
    </main>

@endsection