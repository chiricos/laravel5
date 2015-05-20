@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        <p>Hay {{$users->lastPage()}} paginas</p>
                        <p>Hay {{$users->total()}} registros</p>
                        <p>Hay {{$users->count()}} registros</p>
                        <p>Hay {!!$users->setPath('custom/url')!!} registros</p>
                        <table class="table table-bordered">

                            <tr>
                                <td>#</td>
                                <td>Nombre</td>
                                <td>Email</td>
                                <td>Tipo</td>
                                <td>Acciones</td>
                            </tr>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->full_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->type}}</td>
                                <td>
                                    <a>editar</a>
                                    <a>eliminar</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        {!!$users->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
