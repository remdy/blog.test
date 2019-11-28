@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Комментраии
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список комментариев</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Текст</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->text }}</td>

                                <td>
                                    @if($comment->status == 1)
                                        <a href="/admin/comments/toggle/{{ $comment->id }}" class="fa fa-lock"></a>
                                    @else
                                        <a href="/admin/comments/toggle/{{ $comment->id }}" class="fa fa-thumbs-o-up"></a>
                                    @endif
                                        <form class="form-horizontal contact-form" role="form" method="post" action="{{ route('comments.destroy', $comment->id) }}">
                                            @csrf
                                            @method('DELETE')
                                    <button onclick="return confirm('Вы уверены?')" type="submit" class="delete">
                                        <a class="fa fa-remove"></a>
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