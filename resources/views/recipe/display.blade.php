@extends('layouts.admin')
@section('title', 'レシピ一覧表')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピリスト</h2>
                <form action="{{ action('Admin\RecipeController@display') }}" method="get">
                 <div class="row">
                    <div class="list-shopping col-md-12 mx-auto">
                    <table class="menutable">
                        <thead>
                            <tr><td>
                                <th scope="col">カテゴリー</th>
                                <th scope="col">調理法</th>
                                <th scope="col">キーワード</th>
                            </td></tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th data-label="カテゴリー">{{ \Str::limit($recipe->category, 80) }}</th>
                            <th data-label="調理法">{{ \Str::limit($recipe->tool, 80) }}</th>
                            <th data-label="キーワード">{{ \Str::limit($recipe->keyword, 80) }}</th>
                            </th></tr>
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="list-shopping col-md-12 mx-auto">
                    <table class="menutable">
                        <thead>
                            <tr><td>
                                <th scope="col" >メニュー名</th>
                            </td></tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th data-label="メニュー">{{ \Str::limit($recipe->menu, 80) }}</th>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>

                <div class="list-shopping col-md-12 mx-auto">
                    <table class="menutable">
                        <thead>
                            <tr><td>
                                <th scope="col">材料</th>
                                <th scope="col">分量</th>
                                <th scope="col">単位</th>
                            </td></tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th data-label="材料">{{ \Str::limit($recipe->foodname, 80) }}</th>
                            <th data-label="分量">{{ \Str::limit($recipe->foodnum, 80) }}</th>
                            <th data-label="単位">{{ \Str::limit($recipe->unit, 80) }}</th>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>

                <div class="list-shopping col-md-12 mx-auto">
                    <table class="menutable">
                        <thead>
                            <tr><td>
                                <th scope="col">作り方</th>
                                <th scope="col">画像</th>
                            </td></tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th data-label="メニュー">{{ \Str::limit($recipe->howto, 500) }}</th>
                            <th data-label="画像">{{ \Str::limit($recipe->image, 250) }}</th>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>

            <div class="link-a">
                <a href="{{ action('Admin\RecipeController@edit', ['id' => $recipe->id]) }}">編集/</a>
                <a href="{{ action('Admin\RecipeController@delete', ['id' => $recipe->id]) }}">削除</a>
            </div>
            {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
