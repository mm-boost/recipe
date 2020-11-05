@extends('layouts.admin')
@section('title', '買い物リストの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>買い物リスト</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ShoppinglistController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ShoppinglistController@index') }}" method="get">
                    <div class="form-group row">
                        <h4><span class="label label-success">カテゴリ</span></h4>
                         <div class="col-md-10">
                            　<select name="shopcategory">
                               <option value="">選択してください</option>
                               <option value="スーパー">スーパー</option>
                               <option value="ドラックストア">ドラッグストア</option>
                               <option value="ネットスーパー">ネットスーパー</option>
                               <option value="お気に入り">お気に入り</option>
                               <option value="未分類">未分類</option>
                              </select>
                         </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="list-shopping col-md-12 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                            <td></td>
                                <th scope="col" width="8%">チェック</th>
                                <th scope="col" width="13%">購入先</th>
                                <th scope="col" width="13%">商品名</th>
                                <th scope="col" width="8%">金額</th>
                                <th scope="col" width="8%">個数</th>
                                <th scope="col" width="10%">合計金額</th>
                                <th scope="col" width="7%">分類</th>
                                <th scope="col" width="13%">メモ</th>
                                <th scope="col" width="10%">画像</th>
                                <th scope="col" width="10%">編集</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $shoppinglist)
                                <tr>
                                    <td data-label="お気に入り">{{ \Str::limit($shoppinglist->favorite, 100) }}</td>
                                    <th data-label="購入先">{{ \Str::limit($shoppinglist->retaile, 100) }}</th>
                                    <td data-label="商品名">{{ \Str::limit($shoppinglist->productname, 100) }}</td>
                                    <td data-label="金額">{{ \Str::limit($shoppinglist->amount, 100) }}</td>
                                    <td data-label="個数">{{ \Str::limit($shoppinglist->num, 100) }}</td>
                                    <td data-label="合計金額">{{ \Str::limit($shoppinglist->amounttotal, 100) }}</td>
                                    <td data-label="分類">{{ \Str::limit($shoppinglist->genre, 100) }}</td>
                                    <td data-label="メモ">{{ \Str::limit($shoppinglist->memo, 250) }}</td>
                                    <td data-label="画像">{{ \Str::limit($shoppinglist->image, 250) }}</td>
                                    <td data-label="編集">
                                    　<div>
                                        <a href="{{ action('Admin\ShoppinglistController@edit', ['id' => $shoppinglist->id]) }}">編集</a>
                                    　</div>
                                      <div>
                                        <a href="{{ action('Admin\ShoppinglistController@delete', ['id' => $shoppinglist->id]) }}">削除</a>
                                      </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection