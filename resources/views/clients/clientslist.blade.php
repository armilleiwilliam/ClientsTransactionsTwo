@include('layout.header')
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
<div class="margin-10">
    <a class="btn btn-primary" href="/insertclient">Add a client</a>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Client name</th>
        <th>Client last name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($clients))
        @foreach($clients as $client)
            <tr>
                <td>{{$client->FirstName}}</td>
                <td>{{$client->LastName}}</td>
                <td>{{$client->email}}</td>
                <td>
                    <a href="{{'editclient'}}/{{$client->id}}">
                        <button class="btn btn-success">Edit</button>
                    </a>
                    <a href="{{'deleteclient'}}/{{$client->id}}">
                        <button class="btn btn-danger delete">Delete</button>
                    </a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="3">No client</td>
        </tr>
    @endif

    </tbody>
</table>

@if(!empty($pagination))
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if($pag > 0)
                <li class="page-item"><a class="page-link" href="?pag={{$pag - 1}}">Previous</a></li>
            @endif

            @for($ind = 0; $ind < $pagination; $ind++)
                @if($ind == $pag)
                    <li class="page-item active"><a class="page-link" href="?pag={{$ind}}">{{$ind + 1}}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="?pag={{$ind}}">{{$ind + 1}}</a></li>
                @endif
            @endfor

            @if($pagination > ($pag + 1))
                <li class="page-item"><a class="page-link" href="?pag={{$pag + 1}}">Next</a></li>
            @endif
        </ul>
    </nav>
    @endif
    <script>
        $(document).on('click', '.delete', function (e) {
            var confirmed = confirm("Are you sure you want to delete this record ?");
            if (!confirmed) {
                return false;
            }

        });
    </script>
@include('layout.footer')