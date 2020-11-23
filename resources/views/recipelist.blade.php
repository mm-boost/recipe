{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
@section('title', 'レシピ一覧表')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>レシピリスト</h2>
                <form action="{{ action('Admin\RecipeController@add') }}" method="post" enctype="multipart/form-data">
                    
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
　　　　　　　　　　 <a class=categorylink href="./resipe1.html">お気に入り</a>
　　　　　　　　　　 </li>
                   <li class="categorypage">
　　　　　　　　　　 <a class=categorylink href="./resipe2.html">和食</a>
　　　　　　　　　　 </li>
　　　　　　　　   <li class="categorypage">
　　　　　　　　　　 <a class=categorylink href="./resipe3.html">洋食</a>
　　　　　　　　　　 </li>
　　　　　　　　   <li class="categorypage">
　　　　　　　　　　 <a class=categorylink href="./resipe4.html">中華</a>
　　　　　　　　　　 </li>
　　　　　　　      <li class="categorypage">
　　　　　　　　　　 <a class=categorylink href="./resipe5.html">デザート</a>
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
