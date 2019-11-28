@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Слайды
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="post" action="{{ route('sliders.update', $slider->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Изменить слайд</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ $slider->getImage() }}" alt="" width="200" class="img-responsive">
                                <label for="exampleInputFile">Изображение</label>
                                <input type="file" id="exampleInputFile" name="image">

                                <p class="help-block">Изображение может соответствовать форматам (jpeg, png, bmp, gif, svg, или webp)</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('sliders.index') }}" class="btn btn-default">Назад</a>
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