
    @if($errors->any())
    <div class="alert alert-danger">
        <p>por favor corrije los errores</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {!! $error !!}
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(Session::has('message'))
        <p class="alert alert-success">{{Session::get('message')}}</p>
    @endif
