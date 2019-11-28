@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Карточки
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form enctype="multipart/form-data" method="post" action="{{ route('cards.store') }}">
            @csrf
            <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавить карточку</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{ old('title') }}" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">картинка карточки</label>
                                <input type="file" name="image" id="exampleInputFile">

                                <p class="help-block">Изображение может соответствовать форматам (jpeg, png, bmp, gif, svg, или webp)</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Краткое описание</label>
                                <textarea name="description" id="editor1" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Содержание</label>
                                <textarea name="content" id="editor" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('cards.index') }}" class="btn btn-default">Назад</a>
                        <button class="btn btn-success pull-right">Добавить</button>
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