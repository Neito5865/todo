@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/category.css')}}">
@endsection

@section('content')
<div class="category__alert">
    @if(session('message'))
    <div class="category__alert--success">
        {{session('message')}}
    </div>
    @endif
    @if ($errors->any())
    <div class="category__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="category__content">
    <form action="" class="create-form" method="post">
    @csrf
        <div class="create-form__item">
            <input class="create-form__item-input" type="text" name="category" value="">
        </div>
        <div class="create-form__button">
            <input type="submit" value="作成" class="create-form__button-submit">
        </div>
    </form>

    <div class="category-table">
        <table class="category-table__inner">
            <tr class="category-table__row">
                <th class="category-table__header">
                    Category
                </th>
            </tr>
            @foreach ($categories as $category)
            <tr class="category-table__row">
                <td class="category-table__item">
                    <form action="" method="post" class="update-form">
                    {{-- @method('PATCH') --}}
                    @csrf
                        <div class="update-form__item">
                            <input type="text" name="content" value="カテゴリー1" class="update-form__item-input">
                            <input type="hidden" name="id" value="">
                        </div>
                        <div class="update-form__button">
                            <input type="submit" value="更新" class="update-form__button-submit">
                        </div>
                    </form>
                </td>
                <td class="category-table__item">
                    <form action="" method="post" class="delete-form">
                    {{-- @method('DELETE') --}}
                    @csrf
                        <div class="delete-form__button">
                            <input type="submit" value="削除" class="delete-form__button-submit">
                            <input type="hidden" name="id" value="">
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
