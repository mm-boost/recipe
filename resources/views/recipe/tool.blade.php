{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
@section('title', 'レシピ一覧表')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピリスト</h2>
                    <div class="row">
                        <div class="col-md-4">
                        <a href="{{ action('Admin\RecipeController@add') }}" role="button" class="btn btn-primary">レシピ作成</a>
                     　　</div>
                    </div>
                    <div class="col-md-8">
                        <form action="{{ action('Admin\RecipeController@tool') }}" method="get">
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

                    @foreach($tools as $tool)
                    <div class="category">
                        <ul>
                            <li class="categorypage">
                            <a class=categorylink href="{{ route('recipe.tool.list', ['id' => 1]) }}" >{{ $tool->tool }}</a>
                            </li>
                        </ul>
                    </div>
                    @endforeach    
            
                {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
            </div>
        </div>
    </div>
@endsection
