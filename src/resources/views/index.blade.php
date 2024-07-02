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
    <div class="section__title">
        <h2>新規作成</h2>
    </div>
    <form action="/todos" class="create-form" method="post">
    @csrf
        <div class="create-form__item">
            <input class="create-form__item-input" type="text" name="content" value="{{old('content')}}">
            <select class="create-form__item-select" name="">
                <option value="" selected hidden>カテゴリ</option>
                <option value="">サンプル1</option>
                <option value="">サンプル2</option>
            </select>
        </div>
        <div class="create-form__button">
            <input type="submit" value="作成" class="create-form__button-submit">
        </div>
    </form>

    <div class="section__title">
        <h2>Todo検索</h2>
    </div>
    <form action="" class="search-form" method="post">
    @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="content">
            <select class="search-form__item-select" name="">
                <option value="" selected hidden>カテゴリ</option>
                <option value="">カテゴリ1</option>
                <option value="">カテゴリ2</option>
            </select>
        </div>
        <div class="search-form__button">
            <input type="submit" value="検索" class="search-form__button-submit">
        </div>
    </form>

    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">
                    <span class="todo-table__header-span">Todo</span>
                    <span class="todo-table__header-span">カテゴリ</span>
                </th>
            </tr>
            @foreach ($todos as $todo)
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form action="/todos/update" method="post" class="update-form">
                    @method('PATCH')
                    @csrf
                        <div class="update-form__item">
                            <input type="text" name="content" value="{{$todo['content']}}" class="update-form__item-input">
                            <input type="hidden" name="id" value="{{$todo['id']}}">
                        </div>
                        <div class="update-form__item">
                            <p class="update-form__item-p">Category 1</p>
                        </div>
                        <div class="update-form__button">
                            <input type="submit" value="更新" class="update-form__button-submit">
                        </div>
                    </form>
                </td>
                <td class="todo-table__item">
                    <form action="/todos/delete" method="post" class="delete-form">
                    @method('DELETE')
                    @csrf
                        <div class="delete-form__button">
                            <input type="submit" value="削除" class="delete-form__button-submit">
                            <input type="hidden" name="id" value="{{$todo['id']}}">
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
