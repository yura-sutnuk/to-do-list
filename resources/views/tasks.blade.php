<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')


    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand" id="title" href="{{ url('/') }}">
                        Task List
                    </a>
                </div>
                <div class="navbar-header floatRight">
                    <a href="{{url('exit')}}"  class="navbar-brand">
                        Exit
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div class=" panel-default panel container">
        <div class="panel-heading ">
            Новая задача
        </div>
    @include('common.errors')
        <div class="panel-body">
            <form action="{{ url('task') }}" method="POST" class="form-horizontal ">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Задача</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Добавить задачу
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (count($tasks) > 0)
        <div class="panel panel-default container">
            <div class="panel-heading">
                Текущая задача
            </div>

            <div class="panel-body position-absolute" id="block">
               <div class="dragedBlock">

                    <?php $order = 1; ?>
                    @foreach ($tasks as $task)

                    <div onmousedown="drugOBJ(this,event)" class="unselectable  <?php echo 'class'.$order ?>" style="order:<?php echo $order++?>">

                        <span >{{ $task->name }}</span>

                        <div class="formBlock">
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Удалить
                                    </button>
                                </form>
                        </div>
                    </div>

                    @endforeach
               </div>
            </div>
        </div>
    @endif

@endsection