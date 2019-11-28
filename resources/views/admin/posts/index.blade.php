@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Посты
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список постов</h3>
                    @include('admin.errors')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('posts.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Статус</th>
                            <th>Категория</th>
                            <th>Теги</th>
                            <th>Картинка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    @if($post->status == 1)
                                        <a href="/admin/posts/toggle/{{ $post->id }}" class="fa fa-lock"></a>
                                    @else
                                        <a href="/admin/posts/toggle/{{ $post->id }}" class="fa fa-thumbs-o-up"></a>
                                    @endif
                                </td>
                                <td>{{ $post->getCategoryTitle() }}</td>
                                <td>{{ $post->getTagsTitles() }}</td>
                                <td>
                                    <img src="{{ $post->getImage() }}" alt="" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="fa fa-pencil"></a>
                                    <form class="form-horizontal contact-form" role="form" method="post" action="{{ route('posts.destroy', $post->id) }}">
                                        @csrf
                                        @method('DELETE')
                                    <button onclick="return confirm('Вы уверены?')" type="submit" class="delete">
                                        <span class="fa fa-remove"></span>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection