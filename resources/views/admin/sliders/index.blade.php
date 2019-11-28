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

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список слайдов</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('sliders.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Изображение</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td> <img src="{{ $slider->getImage() }}" alt="" class="img-responsive" width="150"></td>
                                <td>
                                    <a href="{{ route('sliders.edit', $slider->id) }}" class="fa fa-pencil"></a>
                                    <form class="form-horizontal contact-form" role="form" method="post" action="{{ route('sliders.destroy', $slider->id) }}">
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