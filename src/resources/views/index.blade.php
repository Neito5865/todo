@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="todo__alert">
    <div class="todo__alert--success">
        Todoを作成しました
    </div>
</div>

<div class="todo__content">
    <form action="" class="create-form" method="post">
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
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form action="" method="post" class="update-form">
                    @csrf
                        <div class="update-fomr__item">
                            <input type="text" name="content" value="test" class="update-form__item-input">
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
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form action="" method="post" class="update-form">
                    @csrf
                        <div class="update-fomr__item">
                            <input type="text" name="content" value="test2" class="update-form__item-input">
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
        </table>
    </div>
</div>

@endsection
