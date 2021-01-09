{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
@section('title', 'レシピ一覧表')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピカテゴリータグ一覧</h2>
                <h5>レシピの作成、編集、閲覧ができるページです</h5>
                <h5>レシピは料理のジャンル、主な調理器具、キーワードのカテゴリーを設定できます</h5>
            
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ action('Admin\RecipeController@add') }}" role="button" class="btn btn-primary">レシピ作成</a>
                    </div>
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
                        <a class="recipe_link" href="{!! action('Admin\CategoriesController@index'); !!}">ジャンルカテゴリー</a></h3>
                    <h3 class="recipe_page">
                        <a class="recipe_link" href="{!! action('Admin\ToolController@index'); !!}">調理法</a></h3>
                    <h3 class="recipe_page">
                        <a class="recipe_link" href="{!! action('Admin\KeywordController@index'); !!}">キーワード</a></h3>
                </div>
            </div>
        </div>
    </div>
@endsection
