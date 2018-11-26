@include('layout.header')
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
            {{Session::get('success_msg')}}!
            <a href="{{ url('/editclient') }}/{{Session::get('id_client')}}">Check client just created.</a>
        </div>
    @endif
    <!-- End validation errors -->

    <!-- Start add a new client box -->
    <div class="bd-example">
        <div class="card">
            <div class="card-header">
                <h3>Add a new client</h3>
            </div>
            <div class="card-body">
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <p class="login-box-msg">Insert Client</p>
                    <form method="post" enctype="multipart/form-data" action="{{url('createclient')}}" name="addClient">
                        {{csrf_field()}}
                        <div class="form-group has-feedback">
                            <input type="hidden" name="id" value="">
                            <div class="form-group has-feedback">
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{ old('lastname') }}">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback email-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="file" name="input_img" class="form-control" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <button type="button" class="btn btn-primary btn-block btn-flat width-20" id="insertClient">Add client</button>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Add a new client box -->
</div>
<script>
    $(document).ready(function () {

        var emailPass = true;

        // check if email entered is valid
       $('[name=email]').on('keyup',function (e) {
           var email = $(this).val();
           var regemail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
           var emailTest = regemail.test(String(email).toLowerCase());

           // check if test passed
           if(emailTest){
               $('.email-feedback').text('Valid').css('color','black');
               emailPass = true;
           } else {
               $('.email-feedback').text('Email format no valid.').css('color','red');
               emailPass = false;
           }

           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });

           // check if email already existing
           if(emailPass) {
               $.ajax({
                   url: "{{ url('/checkEmail') }}",
                   data: {emailNew: email},
                   method: 'post',
                   success: function (data) {
                       if (!data.success) {
                           $('.email-feedback').text('Email not available.').css('color', 'red');
                           emailPass = false;
                       } else {
                           $('.email-feedback').text('Valid').css('color', 'black');
                           emailPass = true;
                       }
                   }
               }).fail(function () {
                   alert("Server communication failure. Please, contact the administrator.")
               });
           }
       });

        // submit client values
        $('#insertClient').on('click',function () {

            var email = $.trim($('[name=email]').val());
            if(emailPass && email != ''){
                document.forms[0].submit();
            } else if(!emailPass) {
                alert('Please, check the email!');
            } else {
                alert('All fields are required!');
            }
        });
    });
</script>
@include('layout.footer')