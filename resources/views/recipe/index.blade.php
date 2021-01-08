{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
@section('title', 'レシピ一覧表')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピカテゴリータグ一覧</h2>
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ action('Admin\RecipeController@add') }}" role="button" class="btn btn-primary">レシピ作成</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="{{ action('Admin\RecipeController@index') }}" method="get">
                        <div class="form-group row">
                            <label class="col-md-2">メニュー</label>
                            <div class="col-md-8">
                                <input type="text" size="30" name="cond_menu" value="{{ $cond_menu }}">
                            </div>
                            <div class="col-md-2">
                            {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
                
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif

                <div class="recipe_index">
                    <h3 class="recipe_page">
                        <a class="recipe_link" href="{!! action('Admin\CategoriesController@index'); !!}">カテゴリー</a></h3>
                    <h3 class="recipe_page">
                        <a class="recipe_link" href="{!! action('Admin\ToolController@index'); !!}">調理法</a></h3>
                    <h3 class="recipe_page">
                        <a class="recipe_link" href="{!! action('Admin\KeywordController@index'); !!}">キーワード</a></h3>
                </div>
            </div>
        </div>
    </div>
@endsection
