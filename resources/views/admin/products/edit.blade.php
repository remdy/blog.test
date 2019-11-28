@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Продукты
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form enctype="multipart/form-data" method="post" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')
            <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Изменить продукт</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $product->title }}" name="title">
                            </div>

                            <div class="form-group">
                                <img src="{{ $product->getImage() }}" alt="" class="img-responsive" width="200">
                                <label for="exampleInputFile">Лицевая картинка</label>
                                <input type="file" id="exampleInputFile" name="image">

                                <p class="help-block">Изображение может соответствовать форматам (jpeg, png, bmp, gif, svg, or webp)</p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Видео</label>
                                <textarea type="text" class="form-control" id="exampleInputEmail1" name="video" placeholder="" rows="6">{{ $product->video }}</textarea>

                                <p class="help-block">Вставьте код видео вместе с тегами iframe<br> Вы так же можете менять размер окна воспроизведения
                                видео с помощью параметров width=" " и height=" "</p>
                            </div>
                            <!-- Date -->

                            <!-- checkbox -->
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="status" value="{{ $product->status }}" class="minimal" {{ (bool)$product->status ? 'checked': '' }}>
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
                                    <textarea name="description" id="editor" cols="30" rows="10" class="form-control">
                                    {{ $product->description }}
                                </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('products.index') }}" class="btn btn-default">Назад</a>
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