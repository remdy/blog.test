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
            <form action="{{ route('about.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавить историю</h3>
                        @include('admin.errors')
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Главное изображение</label>
                        <input type="file" name="image" id="exampleInputFile">

                        <p class="help-block">Изображение может соответствовать форматам (jpeg, png, bmp, gif, svg, или webp)</p>
                    </div>
                    <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Описание</label>
                                    <textarea name="text" id="editor" cols="30" rows="20" class="form-control">{{ old('text') }}</textarea>
                                </div>
                            </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('about.index') }}" class="btn btn-default">Назад</a>
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