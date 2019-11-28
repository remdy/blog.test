@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                О нас
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="post" action="{{ route('about.update', $story->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Изменить историю</h3>
                        @include('admin.errors')
                    </div>
                    <div class="form-group">
                        <img src="{{ $story->getImage() }}" alt="" class="img-responsive" width="200">
                        <label for="exampleInputFile">Лицевая картинка</label>
                        <input type="file" id="exampleInputFile" name="image">

                        <p class="help-block">Изображение может соответствовать форматам (jpeg, png, bmp, gif, svg, or webp)</p>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="text" id="editor" cols="30" rows="10" class="form-control">
                                    {{ $story->text }}
                                </textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('about.index') }}" class="btn btn-default">Назад</a>
                        <button class="btn btn-warning pull-right">Изменить</button>
                    </div>
                    <!-- /.box-footer-->
                </div>
            </form>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection