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
            <form enctype="multipart/form-data" method="post" action="{{ route('posts.update', $post->id) }}">
                @csrf
                    @method('PUT')
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменить пост</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $post->title }}" name="title">
                        </div>

                        <div class="form-group">
                            <img src="{{ $post->getImage() }}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">

                            <p class="help-block">Изображение может соответствовать форматам (jpeg, png, bmp, gif, svg, or webp)</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            <select name="category_id" class="form-control select2" data-placement="Выберите категорию">
                                @foreach($categories as $key => $value)
                                    <option value="{{ $key }}" {{ $post->getCategoryID()=== $key ? 'selected' : ''}}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Теги</label>
                            <select class="form-control select2" name="tag[]" multiple="multiple" data-placement="Выберите теги">
                                @foreach($tags as $key => $value)
                                    <option value="{{ $key }}" {{ $selectedTags->contains($key) ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Date -->
                        <div class="form-group">
                            <label>Дата:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" value="{{ $post->date }}" name="date">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_featured" value="{{ $post->is_featured }}" class="minimal" {{ (bool)$post->is_featured ? 'checked': '' }}>
                            </label>
                            <label>
                                Рекомендовать
                            </label>
                        </div>
                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="status" value="{{ $post->status }}" class="minimal" {{ (bool)$post->status ? 'checked': '' }}>
                            </label>
                            <label>
                                Черновик
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Описание</label>
                                <textarea name="description" id="editor1" cols="30" rows="10" class="form-control">
                                    {{ $post->description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea name="content" id="editor" cols="30" rows="10" class="form-control">
                                {{ $post->content }}
                            </textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('posts.index') }}" class="btn btn-default">Назад</a>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection