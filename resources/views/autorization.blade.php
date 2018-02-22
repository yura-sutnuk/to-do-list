@extends('layouts.app')
@section('content')

    <div class="panel-default panel container center autorization ">
    <div class="panel-heading">
        <span  id="title">

                    Autorization
        </span>
    </div>
    @include('common.errors')
    <form role="form" class="panel-body" id="Forma" action="{{url('tryAutorization')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <input name="name" type="text" id="login"  class="form-control" placeholder="Имя"/>

        </div>
        <div class="form-group">
            <input name="pass" id="pass" type="password"  class="form-control" placeholder="пароль"/>

        </div>
        <div class="form-group">
           <a href="{{url('registration')}}">Registartion</a>

        </div>

        <input type="submit" class="btn btn-danger button" value="Отправить" />

    </form>

    </div>

@endsection