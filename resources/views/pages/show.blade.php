@extends('layout')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <article class="post">
                        <div class="post-thumb">
                            <a href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->getImage() }}" alt=""></a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                @include('partials._category', ['post'=>$post])
                            </header>
                            <div class="entry-content">
                                {!! $post->content !!}
                            </div>
                            <div class="decoration">
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('tag.show', $tag->slug) }}" class="btn btn-default">{{ $tag->title }}</a>
                                @endforeach
                            </div>

                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">By <a href="#">{{ $post->author->name }}</a> On {{ $post->getDate() }}</span>
                                <ul class="text-center pull-right d-inline-block">
                                    <div class="social icons">
                                        <a href="#" target="_blank"><i class="fa fa-github fa-2x"></i></a>
                                        <a href="#" target="_blank"><i class="fa fa-youtube fa-2x"></i></a>
                                        <a href="#" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
                                        <a href="#" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
                                        <a href="#" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
                                        <a href="#" target="_blank"><i class="fa fa-vk fa-2x"></i></a>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <div class="row"><!--blog next previous-->
                        <div class="col-md-6">
                            @if($post->hasPrevious())
                                <div class="single-blog-box">
                                    <a href="{{ route('post.show', $post->getPrevious()->slug) }}">
                                        <img src="{{$post->getPrevious()->getImage()}}" alt="">

                                        <div class="overlay">

                                            <div class="promo-text">
                                                <p><i class=" pull-left fa fa-angle-left"></i></p>
                                                <h5>{{ $post->getPrevious()->title }}</h5>
                                            </div>
                                        </div>


                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if($post->hasNext())
                                <div class="single-blog-box">
                                    <a href="{{ route('post.show', $post->getNext()->slug) }}">
                                        <img src="{{ $post->getNext()->getImage() }}" alt="">

                                        <div class="overlay">
                                            <div class="promo-text">
                                                <p><i class=" pull-right fa fa-angle-right"></i></p>
                                                <h5>{{ $post->getNext()->title }}</h5>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                        </div>
                        @endif
                    </div><!--blog next previous end-->

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <h4>Вам также может понравиться</h4>
                            @foreach($post->related() as $item)
                            <div class="carousel-item @if($loop->first) active @endif" data-interval="6000">
                                    <a href="{{ route('post.show', $item->slug) }}">
                                <img src="{{ $item->getImage() }}" class="d-block w-100" alt="...">
                                        <p>{{ $item->title }}</p>
                                    </a>
                            </div>
                                @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <!--related post carousel-->
                    @if(!$post->comments->isEmpty())
                        @foreach($post->getComments() as $comment)
                            <div class="bottom-comment"><!--bottom comment-->
                                <div class="comment-img">
                                    <img class="img-circle" src="{{ $comment->author->getImage() }}" alt="" width="100px" height="100px">
                                </div>

                                <div class="comment-text">
                                    <h5>{{ $comment->author->name }}</h5>

                                    <p class="comment-date">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </p>

                                    <p class="para">{{ $comment->text }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                <!-- end bottom comment-->

                    @if(Auth::check())
                        <div class="leave-comment"><!--leave comment-->
                            <h4>Оставьте комментраий</h4>
                            <form class="form-horizontal contact-form" role="form" method="post" action="/comment">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="form-group">
                                    <div class="col-md-12">
										<textarea class="form-control" rows="6" name="message"
                                                  placeholder="Комментарий"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Комментировать</button>
                                <a href="/" class="btn btn-primary pull-right">На главную страницу</a>
                            </form>
                        </div><!--end leave comment-->
                    @endif
                </div>
            </div>
        </div>
        <!-- end main content-->
@endsection