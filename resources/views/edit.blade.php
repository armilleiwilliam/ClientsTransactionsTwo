@extends('layout.header')

@section('content')

    @include('layout.user-headers')
    <!-- /.login-logo -->
    <div class="login-box-body">

        <!-- for validation errors -->
        @if(count($errors) > 0)
            <div id="error" class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                @foreach($errors->all() as $error)
                    <div class="msg">{{$error}}</div>
                @endforeach
            </div>
        @endif



        @if(Session::get('error_msg'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                {{Session::get('error_msg')}}
            </div>
        @elseif(Session::get('success_msg'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success !</h4>
                {{Session::get('success_msg')}}
            </div>
        @endif



        <p class="login-box-msg">Update User</p>

        <form method="post" action="{{url('update')}}">
            {{csrf_field()}}
            <div class="form-group has-feedback">
                <input type="hidden" name="id" value="{{$userDetails->id}}">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$userDetails->name}}">
                <input type="email" name="email" class="form-control" placeholder="Email"  value="{{$userDetails->email}}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    </body>
    </html>
@stop