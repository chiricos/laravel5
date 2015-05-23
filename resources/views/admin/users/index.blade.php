@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    @include('admin.users.partials.message')

                    <p>
                        <a class="btn btn-info" href="{{route('admin.users.create')}}" >
                            Nuevo Usuario
                        </a>
                    </p>

                    <div class="panel-body">
                        @include('admin.users.partials.search')
                        <p>Hay {{$users->lastPage()}} paginas</p>
                        <p>Hay {{$users->total()}} registros</p>
                        <p>Hay {{$users->count()}} registros</p>
                        <!--<p>Hay {!!$users->setPath('users')!!} registros</p>-->

                        @include('admin.users.partials.table')
                        {!!$users->appends(Request::only(['name','type']))->render()!!}
                    </div>

                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['route'=>['admin.users.destroy',':USER_ID'],'method'=>'DELETE','id'=>'form-delete']) !!}
    {!! Form::close() !!}
@endsection



@section('scripts')
    <script>
        $(document).ready(function()
        {
           $('.btn-delete').click(function(e)
           {
               e.preventDefault();
               var row=$(this).parents('tr');
               var id=row.data('id');
               var form=$('#form-delete');
               var url=form.attr('action').replace(':USER_ID',id);
               var data=form.serialize();

               row.fadeOut();

               $.post(url,data,function(result)
               {
                    alert(result.message);
               }).fail(function()
               {
                   alert('el usuario no fue eliminado');
                   row.show();
               });
           });
        });
    </script>
@stop
