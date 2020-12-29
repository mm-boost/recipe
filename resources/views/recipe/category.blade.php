{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
@section('title', 'レシピ一覧表')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピリスト</h2>
                <form action="{{ action('Admin\RecipeController@category') }}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                        <a href="{{ action('Admin\RecipeController@add') }}" role="button" class="btn btn-primary">新規作成</a>
                     　　</div>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="cond_menu" value="{{ $cond_menu }}">
                    </div>
                    <div class="col-md-2">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="category">
                        <ul>
                            <li class="categorypage">
                                <a class=categorylink href="{{ action('Admin\RecipeController@category1') }}">和食</a>
                            </li>
                            <li class="categorypage">
                                <a class=categorylink href="./resipe2.html">洋食</a>
                            </li>
                            <li class="categorypage">
                                <a class=categorylink href="./resipe3.html">中華</a>
                            </li>
                            <li class="categorypage">
                                <a class=categorylink href="./resipe4.html">肉料理</a>
                            </li>
                            <li class="categorypage">
                                <a class=categorylink href="./resipe5.html">野菜料理</a>
                            </li>
                            <li class="categorypage">
                                <a class=categorylink href="./resipe1.html">デザート</a>
                            </li>
                            <li class="categorypage">
                                <a class=categorylink href="./resipe2.html">ドリンク</a>
                            </li>
                            <li class="categorypage">
                                <a class=categorylink href="./resipe3.html">アジア料理</a>
                            </li>
                            <li class="categorypage">
                                <a class=categorylink href="./resipe4.html">ヨーロッパ料理</a>
                            </li>
                            <li class="categorypage">
                                <a class=categorylink href="./resipe5.html">その他</a>
                            </li>
                        </ul>
                    </div>
            
            {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
