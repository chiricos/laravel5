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
                        <p>Hay {{$users->lastPage()}} paginas</p>
                        <p>Hay {{$users->total()}} registros</p>
                        <p>Hay {{$users->count()}} registros</p>
                        <!--<p>Hay {!!$users->setPath('users')!!} registros</p>-->
                        @include('admin.users.partials.table')
                        {!!$users->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
