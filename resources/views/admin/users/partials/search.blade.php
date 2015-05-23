{!! Form::model(Request::all(),['route'=>'admin.users.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}
    <div class="form-group">
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del usuario']) !!}
        {!! Form::select('type',config('options.types'),null,['class'=>'form-control','placeholder'=>'Nombre del usuario']) !!}

    </div>
    {!! Form::submit('buscar',['class'=>'btn btn-default'])!!}
{!! Form::close() !!}