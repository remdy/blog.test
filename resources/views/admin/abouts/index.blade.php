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

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">История</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('about.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Текст</th>
                            <th>Изображение</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stories as $story)
                            <tr>
                                <td>{{ $story->id }}</td>
                                <td>{!! $story->text !!}</td>
                                <td><img src="{{ $story->getImage() }}" alt="" width="100"></td>
                                <td>
                                    <a href="{{ route('about.edit', $story->id) }}" class="fa fa-pencil"></a>
                                    <form class="form-horizontal contact-form" role="form" method="post" action="{{ route('about.destroy', $story->id) }}">
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