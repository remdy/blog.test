@extends('layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                @foreach($stories as $story)
                <p><img src="{{ $story->getImage() }}" alt=""></p>
                <div class="col-md-12">
                    <p>{!! $story->text !!}</p>
                        @endforeach
                </div>

                    <div class="card-deck">
                        @foreach($cards as $card)
                        <div class="card">
                            <a href="{{ route('card.show', $card->slug) }}"><img src="{{ $card->getImage() }}" alt="" width=""></a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $card->title }}</h5>
                                <p class="card-text">{!! $card->description !!}</p>
                                <p class="card-text"><small class="text-muted">{{ $card->created_at->diffForHumans() }}</small></p>
                            </div>
                        </div>
                        @endforeach
                    </div>


            </div>
            <a class="btn-primary" href="#" onclick="return up()">наверх</a>
        </div>
    </div>
@endsection