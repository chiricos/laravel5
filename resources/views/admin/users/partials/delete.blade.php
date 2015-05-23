{!! Form::open(['route'=>['admin.users.destroy',$user],'method'=>'DELETE']) !!}
{!! Form::submit('Eliminar usuario',['class'=>'btn btn-danger','onclick'=>'return confirm("estas seguro de elimiar ?")']) !!}
{!! Form::close() !!}