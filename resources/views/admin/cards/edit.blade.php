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
            <form enctype="multipart/form-data" method="post" action="{{ route('cards.update', $card->id) }}">
            @csrf
            @method('PUT')
            <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Изменить карточку</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $card->title }}" name="title">
                            </div>

                            <div class="form-group">
                                <img src="{{ $card->getImage() }}" alt="" class="img-responsive" width="200">
                                <label for="exampleInputFile">Лицевая картинка</label>
                                <input type="file" id="exampleInputFile" name="image">

                                <p class="help-block">Изображение может соответствовать форматам (jpeg, png, bmp, gif, svg, or webp)</p>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Краткое описание</label>
                                    <textarea name="description" id="editor1" cols="30" rows="10" class="form-control">
                                    {{ $card->description }}
                                </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Содержание</label>
                                <textarea name="content" id="editor" cols="30" rows="10" class="form-control">
                                {{ $card->content }}
                            </textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('cards.index') }}" class="btn btn-default">Назад</a>
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