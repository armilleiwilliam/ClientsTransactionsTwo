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
            {{Session::get('success_msg')}}
        </div>
    @endif

    <p class="login-box-msg">Insert transaction</p>
    <form method="post" action="{{url('createtransaction')}}">
        {{csrf_field()}}
        <div class="form-group has-feedback">
            <select name="clientName" class="form-control">
                <option value="">Select a name</option>
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->FirstName}} {{$client->LastName}}</option>
                @endforeach
            </select>
            <input type="text" name="amount" class="form-control" placeholder="Amount"  value="">
            <input type="date" name="transaction_date" class="form-control" placeholder="Date transaction"  value="">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Insert</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
</div>
@include('layout.footer')