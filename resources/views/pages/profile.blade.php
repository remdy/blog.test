@extends('layout')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 container-fluid">

                    <div class="leave-comment mr0"><!--leave comment-->
                        <h3 class="text-uppercase text-center">Мой профиль</h3>
                        <br>
                        <img src="{{ $user->getImage() }}" alt="" class="profile-image">
                        <form class="form-horizontal contact-form" role="form" method="post" action="/profile" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="position" name="position"
                                           placeholder="Position" value="{{ $user->position }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <h3>Изменить аватар</h3>
                                    <input type="file" class="form-control" id="image" name="avatar">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <div class="box-footer pull-right">
                                <a href="/" class="btn btn-primary">На главную страницу</a>
                            </div>

                        </form>
                    </div><!--end leave comment-->
                </div>
            </div>
        </div>
    </div>
    <!-- end main content-->
@endsection