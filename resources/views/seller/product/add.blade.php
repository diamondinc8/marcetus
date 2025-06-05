@extends('seller.layouts.main')

@section('seller')
    партнер
@endsection

@section('title')
    Добавление карточки
@endsection

@section('content')
    <form action="{{ route('goods.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mt-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название: </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Начните вводить название"
                    name="title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Описание: </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desctiprion"
                    placeholder="Начните вводить описание"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Изображения товара: </label>
                <input class="form-control" id="formFileMultiple" name="images[]" type="file" accept="image/*"
                    class="form-control" multiple>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label class="col-form-label">Стоимость: </label>
                </div>
                <div class="col-auto">
                    <input type="number" name="cost" class="form-control">
                </div>
                <div class="col-auto">
                    <span class="form-text">
                        руб.
                    </span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">Добавить</button>
    </form>
@endsection
