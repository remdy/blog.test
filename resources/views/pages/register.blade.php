@extends('layout')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 container-fluid text-center">

                    <div class="leave-comment mr0"><!--leave comment-->

                        <h3 class="text-uppercase text-center">Register</h3>

                        <br>
                        <form class="form-horizontal contact-form" role="form" method="post" action="/register">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>

                        </form>
                    </div><!--end leave comment-->
                </div>
            </div>
        </div>
    </div>
    <!-- end main content-->
@endsection