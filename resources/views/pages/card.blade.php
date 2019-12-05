@extends('layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                    <h1>{{ $card->title }}</h1>
                    </div>
                    <img src="{{ $card->getImage() }}" alt="" width="">
                    <p>{!! $card->content !!}</p>
                </div>
                <div class="box-footer">
                    <a href="/about" class="btn btn-primary">Назад</a>
                </div>
            </div>
        </div>
    </div>
@endsection