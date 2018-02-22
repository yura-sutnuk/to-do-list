@extends('layouts.app')

@section('content')

<div class="panel-default panel container center registration">
    <div class="panel-heading">
        <span  id="title">

                    Registration
        </span>
    </div>
    @include('common.errors')
    <form role="form" class="panel-body" id="Forma" action="{{url('tryRegister')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <input name="name" type="text" id="login"  class="form-control" placeholder="Имя"/>

        </div>
        <div class="form-group">
            <input name="pass" id="pass" type="password"  class="form-control" placeholder="пароль"/>

        </div>
        <div class="form-group">
            <input  id="repeatpass" type="password"  class="form-control" placeholder="Повторите пароль"/>

        </div>
        <div class="form-group">
            <a href="{{url('authorization')}}">Log in</a>

        </div>

        <input type="button" class="btn btn-danger button" onclick="CheckRegisterData()" value="Отправить" />

    </form>

</div>


@endsection