@extends('layout')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @foreach($posts as $post)
                        <article class="post">
                            <div class="post-thumb">
                                <a href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->getImage() }}" alt=""></a>
                            </div>
                            <div class="post-content">
                                <header class="entry-header text-center text-uppercase">
                                    @include('partials._category', ['post'=>$post])
                                </header>
                                <div class="entry-content">
                                    <p>{!! $post->description !!}</p>
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
                    @endforeach
                    {{ $posts->links() }}
                </div>
                @include('pages._sidebar')


            </div>
            @include('partials.footslider')
        </div>
        <!-- end main content-->
@endsection