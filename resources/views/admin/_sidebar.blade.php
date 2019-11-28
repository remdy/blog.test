<ul class="sidebar-menu">
    <li class="header">ПАНЕЛЬ УПРАВЛЕНИЯ</li>
    <li class="treeview">
        <a href="{{ route('admin.panel') }}">
            <i class="fa fa-dashboard"></i> <span>Админ-панель</span>
        </a>
    </li>
    <li><a href="{{ route('posts.index') }}"><i class="fa fa-sticky-note-o"></i> <span>Посты</span></a></li>
    <li><a href="{{ route('categories.index') }}"><i class="fa fa-list-ul"></i> <span>Категории</span></a></li>
    <li><a href="{{ route('tags.index') }}"><i class="fa fa-tags"></i> <span>Теги</span></a></li>
    <li>
        <a href="/admin/comments">
            <i class="fa fa-commenting"></i> <span>Комментарии</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ $newCommentsCount }}</small>
            </span>
        </a>
    </li>
    <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
    <li><a href="{{ route('subscribers.index') }}"><i class="fa fa-user-plus"></i> <span>Подписчики</span></a></li>
    <li><a href="{{ route('products.index') }}"><i class="fa fa-product-hunt"></i> <span>Продукция</span></a></li>
    <li><a href="{{ route('sliders.index') }}"><i class="fa fa-exchange"></i> <span>Слайды футера</span></a></li>
    <li><a href="{{ route('about.index') }}"><i class="fa fa-university"></i> <span>О нас</span></a></li>
    <li><a href="{{ route('cards.index') }}"><i class="fa fa-caret-square-o-down"></i> <span>Карточки</span></a></li>

</ul>