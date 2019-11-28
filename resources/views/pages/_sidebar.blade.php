<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">


        <aside>
            <!-- Button trigger modal -->
            <div class="text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Подписаться!
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="/subscribe" method="post">
                        @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Подписка на рассылку новостей</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="widget news-letter">

                                    <input type="text" placeholder="Введите ваш E-mail" name="email">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </aside>

    <aside>
        <h3 class="widget-title text-uppercase text-center">популярные новости</h3>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($popularPosts as $post)
                <div class="carousel-item @if($loop->first) active @endif" data-interval="4000">
                    <a href="{{ route('post.show', $post->slug) }}" class="popular-img"><img src="{{ $post->getImage() }}" alt="">
                        <div class="p-overlay"></div>
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
    </aside>

        <aside>
                <h3 class="widget-title text-uppercase text-center">Рекомендованные новости</h3>
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    @foreach($featuredPosts as $post)
                        <div class="carousel-item  @if($loop->first) active @endif" data-interval="5000">
                            <img src="{{ $post->getImage() }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <a href="{{ route('post.show', $post->slug) }}" class="overlay-text text-center">
                                        <h5 class="text-uppercase">{{ $post->title }}</h5>
                                        <p>{!! $post->description !!}</p>
                                    </a>
                                </div>
                        </div>
                    @endforeach
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
        </aside>

        <aside>
            <h3 class="widget-title text-uppercase text-center">Последние новости</h3>
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($recentPosts as $post)
                        <div class="carousel-item  @if($loop->first) active @endif" data-interval="6000">
                            <img src="{{ $post->getImage() }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="{{ route('post.show', $post->slug) }}" class="overlay-text text-center">
                                    <h5 class="text-uppercase">{{ $post->title }}</h5>
                                    <p>{!! $post->description !!}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </aside>

        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Категории</h3>
            <ul>
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a>
                        <span class="post-count pull-right">{{ $category->posts()->count() }}</span>
                    </li>
                @endforeach
            </ul>
        </aside>

        <aside>
            @if(Auth::check())
            <div class="box-footer text-center">
                <a href="/user/forms" class="btn btn-primary btn-lg">Создать пост</a>
            </div>
                @else
            @endif
        </aside>

    </div>
</div>
</div>