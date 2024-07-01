@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="todo__alert">
    @if(session('message'))
    <div class="todo__alert--success">
        {{session('message')}}
    </div>
    @endif
    @if ($errors->any())
    <div class="todo__alert--danger">
        <ul class="todo__alert--danger">
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="todo__content">
    <form action="/todos" class="create-form" method="post">
    @csrf
        <div class="create-form__item">
            <input class="create-form__item-input" type="text" name="content">
        </div>
        <div class="create-form__button">
            <input type="submit" value="作成" class="create-form__button-submit">
        </div>
    </form>

    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">
                    Todo
                </th>
            </tr>
            @foreach ($todos as $todo)
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form action="/todos/update" method="post" class="update-form">
                    @csrf
                        <div class="update-form__item">
                            <input type="text" name="content" value="{{$todo['content']}}" class="update-form__item-input">
                        </div>
                        <div class="update-form__button">
                            <input type="submit" value="更新" class="update-form__button-submit">
                        </div>
                    </form>
                </td>
                <td class="todo-table__item">
                    <form action="" method="post" class="delete-form">
                    @csrf
                        <div class="delete-form__button">
                            <input type="submit" value="削除" class="delete-form__button-submit">
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
