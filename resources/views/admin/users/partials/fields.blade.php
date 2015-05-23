
<div class="form-group">
    {!! Form::label('email','Correo') !!}
    {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'ingrese su email']) !!}
</div>
<div class="form-group">
    {!! Form::label('password','Contraseña') !!}
    {!! Form::password('password',['class'=>'form-control','placeholder'=>'contraseña']) !!}
</div>
<div class="form-group">
    {!! Form::label('first_name','Primer Nombre') !!}
    {!! Form::text('first_name',null,['class'=>'form-control','placeholder'=>'ingrese su primer nombre']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name','Apellido') !!}
    {!! Form::text('last_name',null,['class'=>'form-control','placeholder'=>'ingrese su apellido']) !!}
</div>

<div class="form-group">
    {!! Form::label('type','Tipo de usuario') !!}
    {!! Form::select('type',[''=>'seleccione tipo','user'=>'usuario','admin'=>'administrador'],null,['class'=>'form-control']) !!}
</div>
