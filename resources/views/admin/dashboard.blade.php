@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Панель администратора
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Главная страница</h3>
            </div>
            <div class="box-body">
                Если вы это видите, значит вы администратор!)
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Описание
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        <div class="box-footer">
            <a href="/" class="btn btn-primary btn-lg">На главную страницу</a>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
