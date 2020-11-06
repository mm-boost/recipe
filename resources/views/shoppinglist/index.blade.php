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
                               <option value="ショッピングモール">ショッピングモール</option>
                               <option value="スーパー">スーパー</option>
                               <option value="ドラッグストア">ドラッグストア</option>
                               <option value="コンビニ">コンビニ</option>
                              </select>
                               <label>お気に入り</label>
                               <select name="shopcategory">
                                <option>○</option>
                                <option>✖︎</option>
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
                                <th scope="col" width="15%">購入先</th>
                                <th scope="col" width="10%">商品名</th>
                                <th scope="col" width="8%">金額</th>
                                <th scope="col" width="8%">個数</th>
                                <th scope="col" width="11%">合計金額</th>
                                <th scope="col" width="8%">分類</th>
                                <th scope="col" width="15%">メモ</th>
                                <th scope="col" width="8%">画像</th>
                                <th scope="col" width="9%">編集</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $shoppinglist)
                                <tr>
                                    <th data-label="購入先">{{ \Str::limit($shoppinglist->retailer, 250) }}</th>
                                    <th data-label="商品名">{{ \Str::limit($shoppinglist->productname, 100) }}</th>
                                    <th data-label="金額">{{ \Str::limit($shoppinglist->amount, 100) }}</th>
                                    <th data-label="個数">{{ \Str::limit($shoppinglist->num, 100) }}</th>
                                    <th data-label="合計金額">{{ \Str::limit($shoppinglist->amounttotal, 100) }}</th>
                                    <th data-label="分類">{{ \Str::limit($shoppinglist->genre, 100) }}</th>
                                    <th data-label="メモ">{{ \Str::limit($shoppinglist->memo, 250) }}</th>
                                    <th data-label="画像">{{ \Str::limit($shoppinglist->image, 250) }}</th>
                                    <th data-label="編集">
                                    　<div class="link-a">
                                        <a href="{{ action('Admin\ShoppinglistController@edit', ['id' => $shoppinglist->id]) }}">編集/</a>
                                        <a href="{{ action('Admin\ShoppinglistController@delete', ['id' => $shoppinglist->id]) }}">削除</a>
                                      </div>
                                    </th>
                                    <th data-label="お気に入り">{{ \Str::limit($shoppinglist->favorite, 100) }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection