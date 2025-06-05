@extends('seller.layouts.main')

@section('seller')
    партнер
@endsection

@section('title')
    Карточки товаров
@endsection

@section('content')
    <a href="{{ route('goods.add') }}" class="btn btn-success mt-3">Добавить новую карточку</a>
@endsection
